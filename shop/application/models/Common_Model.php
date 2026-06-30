<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Common_Model extends MY_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function provinces_combo(){
        return $this->select($this->tables['province']);
    }

    function cities_combo($province_id){
        return $this->select($this->tables['city'] , "*" , array("province_id"=>$province_id));
    }

    function add_hit($prId){
        self::insert($this->tables['hits'] , array(
            'ip'=> $_SERVER['REMOTE_ADDR'],
            'product_id'=>$prId,
            'time'=>time()
        ));
    }

    function searchResult($searchVal){
        $sql = "(select pr.name , pr.id , 'product' tbl_type from ".$this->tables['products']." pr
        where pr.name LIKE '%".$searchVal."%') 
        UNION
        (select prg.name , prg.id , 'product_group' tbl_type from ".$this->tables['product_groups']." prg
        where prg.name LIKE '%".$searchVal."%')";
        return self::sp($sql);
    }

}