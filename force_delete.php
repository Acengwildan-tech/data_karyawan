<?php
function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return unlink($dir);
    }
    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }
        $path = $dir . DIRECTORY_SEPARATOR . $item;
        if (is_dir($path)) {
            // Remove read-only attributes on Windows
            chmod($path, 0777);
            deleteDirectory($path);
        } else {
            chmod($path, 0777);
            unlink($path);
        }
    }
    chmod($dir, 0777);
    return rmdir($dir);
}

$breezeDir = __DIR__ . '/vendor/laravel/breeze';
if (deleteDirectory($breezeDir)) {
    echo "Successfully deleted $breezeDir\n";
} else {
    echo "Failed to delete $breezeDir\n";
}
