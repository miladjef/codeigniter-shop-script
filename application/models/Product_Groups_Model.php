<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 9/30/2016
 * Time: 3:29 PM
 */
class Product_Groups_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = $this->tables['product_groups'];
    }
    
    function insertData($info){
        return self::insert($this->table , $info);
    }
    
    function getGroupInfo($group_id){
        return $this->getRow($this->table , ['id'=>$group_id]);
    }
    
    function updateData($data , $condition){
        return self::update($this->table , $data , $condition);
    }
    
    function deleteData($condition){
        return self::delete($this->table , $condition);
    }
    function selectData(){
        return self::select($this->table);
    }
    
    
    function product_groups_combo(){
        return self::select($this->table , "*" , array("active"=>1));
    }

    function selectProducts($group_id){
        return self::select($this->tables['products'] , "*" , array("group_id"=>$group_id , "active"=>1));
        
    }
}