<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Customers_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = $this->tables['customers'];
    }
    
    function addUser($info){
        return $this->insert($this->table , array(
            "name"=>$info['name'],
            "last_name"=>$info['last_name'],
            "pass"=>crypt(md5($info['password']),"faraDars"),
            "username"=>$info['username'],
            "province"=>$info['provinceCombo'],
            "city"=>$info['cityCombo'],
            "email"=>$info['email'],
            "address"=>$info['address'],
            "tel"=>$info['tel'],
            "mobile"=>$info['mobile'],
            "postal_code"=>$info['postal_code'],
            "national_code"=>$info['national_code'],
        ));
    }

    function emailIsRepetitive($email){
        $result = $this->select($this->tables['customers'] , "*" , array("email"=>$email));
        return (count($result))>0;
    }

    function check_user_login($email , $password){
        return $this->getRow($this->table , array("email"=>$email , "pass"=>crypt(md5($password),'faraDars')));
    }

    function customerInfo($customerId){
        $sql = "select cu.* , prv.name province , cty.name city FROM ".$this->table." cu
        inner join ".$this->tables['province']." prv on cu.province = prv.id 
        inner join ".$this->tables['city']." cty on cu.city = cty.id
        where cu.id = ".$customerId;
        return current(self::sp($sql));
    }

    function selectData(){
        $sql = "select cu.* , prv.name province , cty.name city FROM ".$this->table." cu
        inner join ".$this->tables['province']." prv on cu.province = prv.id 
        inner join ".$this->tables['city']." cty on cu.city = cty.id";
        return self::sp($sql);
    }


}