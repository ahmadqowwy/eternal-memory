<?php
session_start();
header('Content-Type: application/json');
include 'config.php';

 $photos = [];
 $result = mysqli_query($conn, "SELECT id, image, title, description FROM memories ORDER BY id DESC");
while ($row = mysqli_fetch_assoc($result)) {
    $photos[] = [
        'id' => $row['id'],
        'image' => $row['image'],
        'title' => $row['title'],
        'description' => $row['description'] ?? ''
    ];
}
echo json_encode(['photos' => $photos]);