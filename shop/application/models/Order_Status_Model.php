<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Order_Status_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'orders_status';
    }

    function insertData($info){
        return self::insert($this->table , $info);
    }

    function getOrderStatusInfo($group_id){
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


}