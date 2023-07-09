<?php

class user{
    private $db;
    function __construct($db_ref){
        $this->db=$db_ref;
    }
    function get_user($data=array()){
        $sql='select * from user where '.arr2and($data);
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        
    }
}