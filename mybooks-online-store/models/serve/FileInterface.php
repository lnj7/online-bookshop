<?php

spl_autoload_register(function ($class){
    $arr=['goods','interfaces','orders','reviews','serve','customer'];
    foreach ($arr as $val) {
        $path=__DIR__."/../$val/$class.php";
        if (file_exists($path))
            require_once $path;
    }
});

interface FileInterface
{
    
    public function isTemp():bool;

    
    public function move(Condition $co=null):bool;
}