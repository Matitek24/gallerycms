<?php


$uploadDir = __DIR__ . '/uploads/';
$photos = array_diff(scandir($uploadDir), ['.', '..']);
echo json_encode(array_values($photos));
?>
