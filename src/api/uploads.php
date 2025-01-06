<?php
ini_set('display_errors', 1);

// echo "here";

echo getUpload();

function getUpload(){
    //Get from database
    require 'dbconnect.php';
    $sql = "SELECT picture_data FROM tu_entry WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $_GET['id']);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result[0];
}
// // Disable output buffering to avoid corruption of binary data
// if (ob_get_level()) {
//     ob_end_clean();
// }

// // The name of the picture file to serve
// $pictureFile = "example.jpg"; // Replace with the actual image file name

// // Check if the file exists in the same directory
// if (file_exists($pictureFile)) {
//     // Get the file extension to determine the MIME type
//     $extension = strtolower(pathinfo($pictureFile, PATHINFO_EXTENSION));

//     // Set the appropriate Content-Type header
//     switch ($extension) {
//         case 'jpg':
//         case 'jpeg':
//             header("Content-Type: image/jpeg");
//             break;
//         case 'png':
//             header("Content-Type: image/png");
//             break;
//         case 'gif':
//             header("Content-Type: image/gif");
//             break;
//         default:
//             header("HTTP/1.1 415 Unsupported Media Type");
//             echo "Unsupported image type.";
//             exit;
//     }

//     // Set headers for proper caching (optional)
//     header("Cache-Control: public, max-age=31536000");
//     header("Content-Length: " . filesize($pictureFile));

//     // Output the file content
//     readfile($pictureFile);
//     exit;
// } else {
//     // Send a 404 response if the file is not found
//     header("HTTP/1.1 404 Not Found");
//     echo "Image not found.";
// }
