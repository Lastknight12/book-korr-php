<?php
// api/assets.php
$types = ['css', 'js', 'images'];
$type = $_GET['type'] ?? '';
$file = $_GET['file'] ?? '';

if (in_array($type, $types) && !empty($file)) {
    $filePath = __DIR__ . "/assets/{$type}/{$file}";

    if (file_exists($filePath)) {
        $mimeType = mime_content_type($filePath);
        header("Content-Type: {$mimeType}");
        readfile($filePath);
        exit;
    } else {
        http_response_code(404);
        echo "File not found.";
        exit;
    }
} else {
    http_response_code(400);
    echo "Invalid request.";
    exit;
}
