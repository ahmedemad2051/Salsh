<?php


class database {
    private $host;
    private  $email;
    private  $password;
    private  $database;
    public $con;
    function __construct()
    {
        $this->host="localhost";
        $this->username="root";
        $this->password="root";
        $this->database="Slash";
        $this->con=$this->connect();
    }
    
     private function connect()
    {
        if($con=new PDO("mysql:host=$this->host; dbname=$this->database","$this->username","$this->password"))
        {
            $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            $con->query("SET NAMES 'utf8'");
            return $con;
        }     
        else throw new Exception("can not connect!");
    }
    
    function close()
    {
        unset($this->con);
        $this->con=NULL;
    }
}
