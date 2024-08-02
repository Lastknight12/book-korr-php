<?php

/**
 * Built assets aren't currently routeable via vercel-php
 * Manually route assets to be found
 */

$fileType = strtolower(pathinfo($_GET['file'], PATHINFO_EXTENSION));

if ($_GET['type'] === 'css') {
    header("Content-type: text/css; charset: UTF-8");
    echo require __DIR__ . '/../css/' . basename($_GET['file']);
} else if ($_GET['type'] === 'js') {
    header('Content-Type: application/javascript; charset: UTF-8');
    echo require __DIR__ . '/../js/' . basename($_GET['file']);
} else if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif', 'svg'])) {
    $filePath = __DIR__ . '/../images/' . basename($_GET['file']);
    if (file_exists($filePath)) {
        switch ($fileType) {
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
            case 'svg':
                header('Content-Type: image/svg+xml');
                break;
        }
        echo file_get_contents($filePath);
    } else {
        // Return a 404 or another appropriate response if the image file is not found
        header("HTTP/1.0 404 Not Found");
        echo "Image file not found.";
    }
} else {
    // Return a 404 or another appropriate response if file type is not supported
    header("HTTP/1.0 404 Not Found");
    echo "File not found.";
}
