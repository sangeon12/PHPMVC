<?php
    function myLoader($className) {
        $prefix = 'arkenzo\\Framework\\';
        $base_dir = __DIR__.'/src/';
        $len = strlen($prefix);
        if(strncmp($prefix, $className, $len)!==0) {
            return;
        }
        // arkenzo\\Framework\\board => board
        $relative_class = substr($className, $len);
        // board => c:/xampp/htdocs/src/board.php
        $file = $base_dir.str_replace('\\','/',$relative_class).'.php';

        if(file_exists($file)) {
            require $file;
        }
    }

    spl_autoload_register('myLoader');
