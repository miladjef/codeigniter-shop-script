<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Products_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'products';
    }

    function insertData($info){
        return self::insert($this->table , $info);
    }

    function getProductInfo($group_id){
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

    function product_combo($group_id){
        return self::select($this->table , "*" , array("active"=>1 , "group_id"=>$group_id));
    }

    function getProductDetails($prId){
        $sql = "select pr.id , pr.name , pr.description , pr.price , pr.code , mf.name manufacturer , pg.name group_name from ".$this->tables['products']." pr
        inner join ".$this->tables['manufacturers']." mf on pr.manufacturer_id = mf.id
        inner join ".$this->tables['product_groups']." pg on pr.group_id = pg.id
        where pr.id =".$prId;
        return current(self::sp($sql));
    }

    public function isProductExists($prId)
    {
        $row = self::getRow($this->tables['products'], array("id" => $prId));
        return (!empty($row));
    }
}