<?php
spl_autoload_register('autoLoadClasses');

function autoLoadClasses($className){
    $path = "";
    $ext = ".class.php";
    $fullPath = $path.$className.$ext;

    if(!file_exists("shared/classes/".$className.$ext)):
        echo "Missing class object ".  $fullPath;
        return false;
    endif;

    include_once $fullPath;
}
?>