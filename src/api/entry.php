<?php
require '../config.php';
$debug = $config['debug'];

ini_set('display_errors', 1);

try {
    createEntry();
} catch (\Throwable $th) {
    http_response_code(400);
    echo json_encode(['error' => $th->getMessage()]);
    exit;
}
function createEntry()
{
    // echo "TEST";
    //TODO: Create Riddle.
    //Get the data from the request.
    $data = json_decode(file_get_contents('php://input'), true);    
    
    //Check if the data is valid.
    // if (!isset($data['title']) || !isset($data['expression']) || !isset($data['diff']) || !isset($data['email']) || !isset($data['pw']) || $data['title'] == null || is_string($data['title']) == false || strlen($data['title']) < 1 || $data['expression'] == null || is_string($data['expression']) == false || strlen($data['expression']) < 1 || $data['diff'] == null || is_numeric($data['diff']) == false || $data['diff'] < 1 || $data['diff'] > 5 || $data['description'] == null || !isset($data['description']) || $data['description'] == null || is_string($data['description']) == false || strlen($data['description']) < 1){
    //     http_response_code(400);
    //     echo json_encode(['error' => 'Bad request TEST']);
    //     exit;
    // }
    
    
    //Check if the password is correct.
    require 'dbconnect.php';

    $stmt = $conn->prepare("INSERT INTO tu_entry (title, description, place, priority, danger, status, picture, picture_data) VALUES (:title, :description, :place, :priority, :danger, :status, :picture, :picture_data)");
    $stmt->bindParam(':title', $data['title']);
    $stmt->bindParam(':description', $data['description']);
    $stmt->bindParam(':place', $data['place']);
    $stmt->bindParam(':priority', $data['priority']);
    $stmt->bindParam(':danger', $data['danger']);
    $stmt->bindParam(':status', $data['status']);
    $stmt->bindParam(':picture', $data['picture']);
    $stmt->bindParam(':picture_data', $data['picture_data']);
    $stmt->execute();

    //Get ID of the last STMT transaction
    $stmt = $conn->prepare("SELECT id FROM tu_entry ORDER BY id DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    //Send Response
    http_response_code(201);
    echo json_encode(['success' => true, 'id' => $result['id']]);
    exit;
}