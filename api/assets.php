<?php

// Handle image requests
if (isset($_GET['file'])) {
    // Serve image files
    $file = basename($_GET['file']);
    $filePath = __DIR__ . '/images/' . $file;

    if (file_exists($filePath)) {
        $extension = pathinfo($file, PATHINFO_EXTENSION);

        // Set appropriate Content-Type based on file extension
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

        readfile($filePath);
        exit; // Ensure no further code is executed
    } else {
        header('HTTP/1.1 404 Not Found');
        echo 'Image not found';
        exit;
    }
}
