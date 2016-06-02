<?php

/**
 * get data 
 *
 * @author onepiece
 */
class display{
    
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


    function getLastRecord()
    {
        $query="SELECT * FROM $this->tablename ORDER BY id DESC LIMIT 1";
        $result=$this->cxn->con->query($query);
        if($result)
        {
            $count=$result->rowCount();
            if($count>0)
            {
                $data=$result->fetch();
                return $data;
            }
        }
        else
        {
            throw new Exception("error! query not execute");
            return FALSE;
        }
    }
    
    function getRecordById($id)
    {
        $query="SELECT * FROM $this->tablename WHERE id =:id ";
        $result=$this->cxn->con->prepare($query);
        $result->bindparam(':id',$id,PDO::PARAM_INT);
        $result->execute();
        if($result)
        {
            $count=$result->rowCount();
            
            if($count>0)
            {
                $data=$result->fetch();
                return $data;
            }
        }
        else
        {
            throw new Exception("error! query not execute");
            return FALSE;
        }
    }
    
    function getAllData()
    {
        $query="SELECT * FROM $this->tablename ORDER BY id DESC";
        $result=$this->cxn->con->prepare($query);
        $result->execute();
        if($result)
        {
            $count=$result->rowCount();
            if($count>0)
            {
               
                $data=$result->fetchAll(PDO::FETCH_ASSOC);
                
                
                return $data;
            }
        }
        else
        {
            throw new Exception("error! query not execute");
            return FALSE;
        }
    }
    
    function getDataByColumn($key,$value)
    {
        $query="SELECT * FROM $this->tablename WHERE $key=:value";
        $result=$this->cxn->con->prepare($query);
        $result->bindparam(':value',$value,PDO::PARAM_STR);
        $result->execute();
     
        if($result)
        {
          
                $data=$result->fetchAll();
                return $data;

        }
    }

    
    function getDataLimit($start,$length,$order='id',$where=null)
    {
        $query="SELECT * FROM $this->tablename";
        if($where!=null)
        {
            $query .=" where $where";
        }
        $query .=" ORDER BY $order DESC LIMIT $start,$length";
        $result=$this->cxn->con->query($query);
        if($result)
        {
            $count=$result->rowCount();

                $data=$result->fetchAll();
                return $data;

        }
    }
    
    function search($column,$content)
    {
        $query="SELECT * FROM $this->tablename where $column LIKE '$content%' ";
        $result=$this->cxn->con->query($query);
        return $result->fetchAll();
    }
    
    function getDataByWhere($where)
    {
        $query="SELECT * FROM $this->tablename WHERE $where";
        $result=$this->cxn->con->prepare($query);
        $result->execute();

        if($result)
        {

                $data=$result->fetchAll();
                return $data;


        }
    }
}
