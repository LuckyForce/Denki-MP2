<?php
header("Content-Type: application/json; charset=UTF-8");
require '../config.php';
$debug = $config['debug'];

ini_set('display_errors', 1);

try {
    // $data = json_decode(file_get_contents('php://input'), true);

    // error_log("Data: " . json_encode($data));
    error_log(print_r($_GET, true));

    $data = [
        'searchText' => $_GET['searchText'] ?? null,
        'searchPlace' => $_GET['searchPlace'] ?? null,
        'priority' => $_GET['priority'] ?? null,
        'order' => $_GET['order'] ?? null,
        'page' => $_GET['page'] ?? 1,
    ];

    if ($debug)
        $entries = getSampleEntries();
    else {
        $entries = getEntries($data);
    }
    echo json_encode($entries, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    http_response_code(200);
} catch (\Throwable $th) {
    http_response_code(400);
    echo json_encode(['error' => $th->getMessage()]);
    exit;
}


function getSampleEntries()
{
    return [
        [
            "id" => 1,
            "title" => "Test 1",
            "description" => "Beschreibung 1",
            "place" => "Ort 1",
            "priority" => 3, // Normal
            "danger" => 2, // Nicht so Gefährlich
            "picture" => "picture1.jpg",
            "agb" => true // AGB accepted
        ],
        [
            "id" => 2,
            "title" => "Test 2",
            "description" => "Beschreibung 2",
            "place" => "Ort 2",
            "priority" => 5, // Sehr wichtig
            "danger" => 4, // Gefährlich
            "picture" => "picture2.png",
            "agb" => true // AGB accepted
        ],
        [
            "id" => 3,
            "title" => "Test 3",
            "description" => "Beschreibung 3",
            "place" => "Ort 3",
            "priority" => 1, // Unwichtig
            "danger" => 1, // Ungefährlich
            "picture" => "picture3.jpeg",
            "agb" => false // AGB not accepted
        ]
    ];
}

//TODO: Check filter
function getEntries($data)
{
    // require 'dbconnect.php';

    // Base SQL query
    $sql = "SELECT * FROM tu_entry WHERE 1=1";
    $params = [];

    // Apply filters
    if (!empty($data['searchText'])) {
        $sql .= " AND (title LIKE :searchText OR description LIKE :searchText)";
        $params[':searchText'] = '%' . $data['searchText'] . '%';
    }

    if (!empty($data['searchPlace'])) {
        $sql .= " AND place LIKE :searchPlace";
        $params[':searchPlace'] = '%' . $data['searchPlace'] . '%';
    }

    if (!empty($data['priority']) && $data['priority'] !== 'All') {
        $sql .= " AND priority = :priority";
        $params[':priority'] = $data['priority'];
    }

    if (!empty($data['order']) && in_array(strtolower($data['order']), ['asc', 'desc'])) {
        $sql .= " ORDER BY created_at " . strtoupper($data['order']);
    } else {
        $sql .= " ORDER BY created_at DESC"; // Default order
    }

    // Pagination
    $page = isset($data['page']) ? max(1, (int)$data['page']) : 1;
    $entriesPerPage = 10; // Adjust as needed
    $offset = ($page - 1) * $entriesPerPage;
    $sql .= " LIMIT :offset, :limit";
    $params[':offset'] = $offset;
    $params[':limit'] = $entriesPerPage;

    error_log("SQL Query: $sql");
    error_log("Parameters: " . json_encode($params));
    error_log("Data: " . json_encode($data));

    try {
        require 'dbconnect.php';
        $stmt = $conn->prepare($sql);
    
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
    
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Output the result as JSON
        header('Content-Type: application/json');
        return $result;
    } catch (PDOException $e) {
        error_log("Database error: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Internal Server Error']);
    }
}

// function getEntries($data) {
//     require 'dbconnect.php';
//     //TODO: Filter
//     $sql = "SELECT * FROM tu_entry WHERE 1=1";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
//     $result = $stmt->fetchAll();
//     return $result;
// }

// Example usage
// $entries = getSampleEntries();
// foreach ($entries as $entry) {
//     print_r($entry);
// }
