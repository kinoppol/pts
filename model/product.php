<?php

class product{
    private $db;
    function __construct($db_ref){
        $this->db=$db_ref;
    }
    function add_product($data=array()){
        $sql='insert into products set '.arr2set($data);
        //print $sql;
        $result=$this->db->query($sql);
        return $result;        
    }
    function update_product($data=array(),$where=array()){
        $sql='update products set '.arr2set($data).' where '.arr2and($where);
        //print $sql;
        $result=$this->db->query($sql);
        return $result;        
    }
    function get_product($data=array()){
        $sql='select * from products where '.arr2and($data);
        //print $sql;
        $result=$this->db->query($sql);

            $res=array();
            while($row=$result->fetch_assoc()){
                $res[]=$row;
            }
            return $res;
        
    }
    
    function delete_product($where=array()){
        $sql='delete from products where '.arr2and($where);
        //print $sql;
        $result=$this->db->query($sql);
        return $result;        
    }
}