<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Customer extends SiteController
{
    function __construct(){
        parent::__construct();
        $this->load->model("customers_model");
    }

    function register(){
        self::setTemplate("register" , array("title"=>lang("user_register")));
    }
    
    function add_user(){
        $data = post();
        //if email is repetitive
        if($this->customers_model->emailIsRepetitive($data['email'])){
            echo self::error(lang("your_email_is_repetitive"));
        }else{
            //some other validations have been ignored
            if($this->customers_model->addUser($data))
                echo self::op_success();
            else
                echo self::op_error();
        }
        
    }
    
    function signin(){
        self::setTemplate("signin" , array("title" =>lang("user_signin")));
    }

    function check_login(){

        $data = post();
        $user = $this->customers_model->check_user_login($data['email'] ,$data['password']);
        if(!empty($user)){
            $this->session->set_userdata("userID",$user['id']);
            $this->session->set_userdata("userFullName",$user['name']." ".$user['last_name']);
            echo self::op_success();
        }
        else
            echo self::error(lang("your_email_or_password_is_incorrect"));
    }

    function logout(){
        $sessions = array('userID', 'userFullName');
        $this->session->unset_userdata($sessions);
        redirect(base_url());
    }


}