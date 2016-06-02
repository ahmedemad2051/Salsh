<?php

class login
{
    private $email;
    private $password;
    private $cxn;
    function __construct($email,$password)
    {
        $this->setData($email,$password);
        $this->connectToDb();

    }

    private function setData($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
    }

    private function connectToDb()
    {
        $this->cxn=new database();
    }

    public function getData()
    {
        $query="SELECT * FROM monks WHERE mail = '$this->email' AND password = password('$this->password')";;
        $result=$this->cxn->con->query($query);
        $count=$result->rowCount();
        if($count==1)
        {
            $data=$result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
        throw new Exception("email or password is invalid. please try again.");
    }
}