<?php

spl_autoload_register(
    function ($class){
    $arr=['goods','interfaces','orders','reviews','serve'];
    foreach ($arr as $val) {
        $path=__DIR__."/../$val/$class.php";
        if (file_exists($path))
            require_once $path;
    }
});


class Author
{

    private $id;
    
    private $name;
    
    private $country;

    public function getName ()
    {
        return $this->name;
    }

    
    public function getCountry ()
    {
        return $this->country;
    }

    
    public function getId ()
    {
        return $this->id;
    }

   
    public function __construct($name,$id=null, $country=null)
    {
        $this->name = $name;
        $this->country = $country;
        $this->id=$id;
    }


}
