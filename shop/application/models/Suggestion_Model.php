<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Suggestion_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = $this->tables['suggested_products'];
    }

    function insertData($info){
        return self::insert($this->table , $info);
    }

    function getInfo($group_id){
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
    function isRowUnique($group_id , $product_id){
        $result = $this->getRow($this->table , ['group_id'=>$group_id , 'product_id'=>$product_id]);
        return (count($result)==0 || !is_array($result));
    }

    function selectProducts(){
        $sql = "select pr.* FROM  ".$this->table." sug
        inner join ".$this->tables['products']." pr on sug.product_id = pr.id
        where sug.active =1";
        $result = self::sp($sql);
        
        for($i=0 ; $i<count($result); $i++){
            $pictures = self::select($this->tables['product_pics'],"*" , array("product_id"=>$result[$i]['id']));
            if(count($pictures)>0)
                $result[$i]['picture'] = current($pictures);
            else
                $result[$i]['picture'] = NULL;
        }
        return $result;
    
    }

}