<?php

/*
 edit data
 */

/**
 *
 * @author onepiece
 */
class update{
    private $tablename;
   
    private $cxn;
    
    function __construct($tablename)
    {
       
            $this->tablename=$tablename;
            
            $this->connectToDb();
        
       
    }

    private function connectToDb()
    {
        $this->cxn=new database();
    }
    
    function editData($data,$id)
    {
        $query="UPDATE $this->tablename SET ";
        foreach($data as $key=>$value)
        {
            $query .=$key." = :".$key." , ";
        }
        
        $query=rtrim($query,' ,');
        $query .=" WHERE id='$id'";
        
         $result=$this->cxn->con->prepare($query);
     
        foreach($data as $key=>$value)
        {
         $result->bindparam(":$key",$data[$key],PDO::PARAM_STR);
        }
       
       if($result->execute())
       {
          return TRUE; 
       }
       else
       {
           throw new Exception("error! query not execute");
           return FALSE;
       }
    }
}
