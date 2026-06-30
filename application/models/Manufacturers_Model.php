<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 9/30/2016
 * Time: 3:29 PM
 */
class Manufacturers_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = $this->tables['manufacturers'];
    }
    
    function insertData($info){
        return self::insert($this->table , $info);
    }
    
    function getBrandInfo($brand_id){
        return $this->getRow($this->table , ['id'=>$brand_id]);
    }
    
    function updateData($data , $condition){
        return self::update($this->table , $data , $condition);
    }
    
    function hasProducts($brand_id){
        $products = self::select($this->tables['products'] , "*" , array("manufacturer_id"=>$brand_id));
        return (count($products)>0);
    }
    function deleteData($condition){
        return self::delete($this->table , $condition);
    }
    function selectData(){
        return self::select($this->table);
    }

    function product_brands_combo(){
        return self::select($this->table , "*" , array("active"=>1));
    }
}