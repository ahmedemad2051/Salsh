<?php

/*
 * delete data
 * 
 */

/**
 * @author onepiece
 */
class delete {
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
    
    function deleteRecordById($id)
    {
        $id=intval($id);
        $query="DELETE FROM $this->tablename WHERE id=:id ";
        $result=$this->cxn->con->prepare($query);
        $result->bindparam(':id',$id,PDO::PARAM_STR);
        if(!$result->execute())
        {
            throw new Exception('error! not deleted');
            return FALSE;
        }
        return TRUE;
        
    }
}
