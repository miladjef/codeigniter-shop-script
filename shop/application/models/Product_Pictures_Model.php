<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Product_Pictures_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = $this->tables['product_pics'];
    }
    
    function insertData($info){
        return self::insert($this->table , $info);
    }
    
    function getProductPictureInfo($picture_id){
        return $this->getRow($this->table , ['id'=>$picture_id]);
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

    function productPictures($prId){
        return self::select($this->tables['product_pics'] , "*" , array("product_id"=>$prId));
    }
    
}