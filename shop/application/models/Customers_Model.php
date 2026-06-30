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
            "pass"=>password_hash($info['password'], PASSWORD_DEFAULT),
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
        $user = $this->getRow($this->table , array("email"=>$email));
        if(empty($user) || !isset($user['pass'])){
            return false;
        }

        if(password_verify($password, $user['pass'])){
            return $user;
        }

        // Backward compatibility with old project passwords.
        if(hash_equals($user['pass'], crypt(md5($password),'faraDars'))){
            $this->update($this->table, array('pass' => password_hash($password, PASSWORD_DEFAULT)), array('id' => $user['id']));
            return $user;
        }

        return false;
    }

    function customerInfo($customerId){
        $sql = "select cu.* , prv.name province , cty.name city FROM ".$this->table." cu
        inner join ".$this->tables['province']." prv on cu.province = prv.id 
        inner join ".$this->tables['city']." cty on cu.city = cty.id
        where cu.id = ?";
        $rows = self::sp($sql, array((int)$customerId));
        return (!empty($rows)) ? current($rows) : false;
    }

    function selectData(){
        $sql = "select cu.* , prv.name province , cty.name city FROM ".$this->table." cu
        inner join ".$this->tables['province']." prv on cu.province = prv.id 
        inner join ".$this->tables['city']." cty on cu.city = cty.id";
        return self::sp($sql);
    }


}