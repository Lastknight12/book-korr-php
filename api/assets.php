<?php

/**
 * Built assets aren't currently routeable via vercel-php
 * Manually route assets to be found
 */
if ($_SERVER['REQUEST_URI'] === '/image' && isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filePath = __DIR__ . '/../images/' . $file;

    if (file_exists($filePath)) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                header('Content-Type: image/jpeg');
                break;
            case 'png':
                header('Content-Type: image/png');
                break;
            case 'gif':
                header('Content-Type: image/gif');
                break;
            case 'webp':
                header('Content-Type: image/webp');
                break;
            default:
                header('HTTP/1.1 415 Unsupported Media Type');
                echo 'Unsupported image type';
                exit;
        }
        
        readfile($filePath); // Read and output the file
    } else {
        header('HTTP/1.1 404 Not Found');
        echo 'Image not found';
    }
} else if (isset($_GET['type']) && $_GET['type'] === 'css') {
    header("Content-type: text/css; charset: UTF-8");
    $file = basename($_GET['file']);
    $filePath = __DIR__ . '/../css/' . $file;

    if (file_exists($filePath)) {
        readfile($filePath); // Read and output the file
    } else {
        header('HTTP/1.1 404 Not Found');
        echo 'CSS file not found';
    }
} else if (isset($_GET['type']) && $_GET['type'] === 'js') { // Changed from '*' to 'js' for consistency
    header('Content-Type: application/javascript; charset: UTF-8');
    $file = basename($_GET['file']);
    $filePath = __DIR__ . '/../js/' . $file;

    if (file_exists($filePath)) {
        readfile($filePath); // Read and output the file
    } else {
        header('HTTP/1.1 404 Not Found');
        echo 'JavaScript file not found';
    }
} else {
    header('HTTP/1.1 400 Bad Request');
    echo 'Invalid asset type';
}
