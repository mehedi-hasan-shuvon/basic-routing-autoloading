<?php 

spl_autoload_register(function ($className) {
    $baseNamespace = 'Project\\'; // Update with your base namespace
    $baseDirectory = __DIR__ . '/../src/'; // Update with the base directory of your classes

    // Convert the namespace to a file path
    $className = str_replace($baseNamespace, '', $className);
    $className = str_replace('\\', '/', $className);

    // Load the class file
    $file = $baseDirectory . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});




?>