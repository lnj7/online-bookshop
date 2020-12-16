<?php


class Admin
{
    private $id;
    private $name;
    private $pass;
    private static $admins=[];

   
    public function __construct ($id, $name, $pass)
    {
        $this->id = $id;
        $this->name = $name;
        $this->pass = $pass;
        Admin::$admins;

    }

   
    public function getId ()
    {
        return $this->id;
    }

    
    public function getName ()
    {
        return $this->name;
    }

    public function getPass ()
    {
        return $this->pass;
    }


}