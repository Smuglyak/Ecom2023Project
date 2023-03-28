<?php
//autoloads all the required files when asking for a view in a controller
spl_autoload_register(
    function ($class) {
        echo "class is: " . $class;

    }

);
//this method triggers automatically to load this file(autoloadSample.php-> spl_autoload_register())
//spl gets the class from the class_exists method
class_exists("Employee");



?>
