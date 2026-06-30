<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Shipping_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'shipping_methods';
    }

    function insertData($info){
        return self::insert($this->table , $info);
    }

    function getShippingInfo($group_id){
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

    function shipping_combo(){
        return $this->select($this->tables['shipping_methods'] , "*" , array("active"=>1));
    }


}