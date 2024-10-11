<?php

spl_autoload_register('myAutoLoader');

function myAutoLoader($className): void{
    $path = "";
    $ext =".php";
    $fullPath = $path . $className . $ext;

    if(file_exists($fullPath)){
        include_once($fullPath);
    }
    else{
        echo "Path Not Found";
    }
}

