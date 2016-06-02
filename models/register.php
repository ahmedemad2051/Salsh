<?php


class register{
    
    private $name;
    private $mail;
    private $password;
    private $cxn;
    
    function __construct($data)
    {
        if(is_array($data))
        {
            $this->setData($data);
            
            $this->connectToDb();
            
            $this->registerData();
        }
        else
        {throw new Exception("error! data must be in array");}
    }
    
    private function setData($data)
    {
        $this->name=$data['name'];
        $this->mail=$data['mail'];
        $this->password=$data['password'];
    }

    private function connectToDb()
    {
        $this->cxn=new database();
    }
    
    private function registerData()
    {

        $query="INSERT INTO monks (name,password,mail) VALUE ('$this->name',password('$this->password'),'$this->mail')";
        $result=$this->cxn->con->query($query);
        if($result)
        {
            echo "data registerd";
            echo "<meta http-equiv=refresh content='2; url=../index.php' />";
        }
        else throw new Exception("error! data not registerd");
    }
}
