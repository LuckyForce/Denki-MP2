<?php
header("Content-Type: application/json; charset=UTF-8");
require '../config.php';
$debug = $config['debug'];

ini_set('display_errors', 1);

try {
    $data = json_decode(file_get_contents('php://input'), true);

    if($debug)
        echo json_encode(getSampleEntries(), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    else{
        echo json_encode(getEntries($data), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }
    http_response_code(200);
} catch (\Throwable $th) {
    http_response_code(400);
    echo json_encode(['error' => $th->getMessage()]);
    exit;
}


function getSampleEntries() {
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
function getEntries($data) {
    require 'dbconnect.php';
    $sql = "SELECT * FROM tu_entry";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

// Example usage
// $entries = getSampleEntries();
// foreach ($entries as $entry) {
//     print_r($entry);
// }

