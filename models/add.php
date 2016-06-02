<?php

/**
 * add data
 *
 * @author onepiece
 */
class add{
    
    private $data;
    private $tablename;
    private $cxn;
    
    function __construct($data,$tablename)
    {
        if(is_array($data))
        {
            $this->data=$data;
            $this->tablename=$tablename;
            $this->connectToDb();
            $this->addData($this->data);
            
        }
        else
        {
            throw new Exception("error! data must be in an array");
        }
    }
    
    function connectToDb()
    {
        $this->cxn=new database();
    }
    
    function addData($data)
    {
        foreach($data as $key=>$value)
        {
            $keys[]=$key;
            $values[]=$value;
            $placeholders[]=":$key";
        }
       
        $tbl_keys=implode($keys,",");
        $tbl_placeholders=implode($placeholders,',');
      
        $tbl_values='"'.implode($values,'","').'"';
        $query="INSERT INTO $this->tablename ($tbl_keys) VALUE ($tbl_placeholders)";
        
        $result=$this->cxn->con->prepare($query);
        for($i=0;$i<count($keys);$i++)
        {
            $result->bindparam($placeholders[$i],$values[$i]);
        }
        if($result->execute())
            return TRUE;
        else
        {
            throw new Exception("error! query not execute");
            return FALSE;
        }
    }
}
