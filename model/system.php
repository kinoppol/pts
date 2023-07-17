<?php

class system{
    private $db;
    function __construct($db_ref){
        $this->db=$db_ref;
    }
    function get_config($data=array()){
       
        $sql='select * from system_config';
        if(count($data)){
          $sql.=' where '.arr2and($data);
        }
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            $systemData=array();
            foreach($res as $row){
                $systemData[$row['id']]=$row['value'];
            }
            return $systemData;
        
    }
}