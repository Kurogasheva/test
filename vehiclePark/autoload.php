<?php

spl_autoload_register(static function ($className)
{
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    $fileName = $className . ".php";

    if (is_file($fileName)) {
        require $fileName;
    }
});