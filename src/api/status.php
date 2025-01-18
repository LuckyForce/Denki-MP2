<?php

//Update status of entry
$data = json_decode(file_get_contents('php://input'), true);

error_log(print_r($data, true));

//Check if the data is valid.
if (!isset($data['id']) || !isset($data['status']) || $data['id'] == null || is_numeric($data['id']) == false || $data['status'] == null || is_numeric($data['status']) == false || $data['status'] < 1 || $data['status'] > 3) {
    //set statuscode
    http_response_code(400);
    echo "error";
    exit;
}

//Prepare SQL
require 'dbconnect.php';
$sql = "UPDATE tu_entry SET status = :status WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':status', $data['status']);
$stmt->bindParam(':id', $data['id']);

//Execute SQL
$stmt->execute();
$result = $stmt->rowCount();

if ($result) {
    //set statuscode
    http_response_code(200);
    echo "success";
} else {
    //set statuscode
    http_response_code(500);
    echo "error";
}
