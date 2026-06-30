<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Review extends SiteController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("customers_model");
        $this->load->model("carts_model");
    }


    public function index()
    {
        if (session_data('userID')) {
            $userInfo = $this->customers_model->customerInfo(session_data("userID"));
            $this->setTemplate("review", array('info' => $userInfo));
        } else {
            $this->setTemplate("review_login");
        }
    }

    public function verify()
    {
        if (session_data('userID')) {
            $userInfo = $this->customers_model->customerInfo(session_data("userID"));
            $cartInfo = self::shopping_cart_info();
            //adding the information
            $this->setTemplate("verify", array("info" => $userInfo, "cartInfo" => $cartInfo));
        }else {
            $this->setTemplate("review_login");
        }
    }

    private function shopping_cart_info(){
        $shopping_cart = session_data('shopping_cart');
        return $this->carts_model->get_shopping_cart_info($shopping_cart);
    }

    public function accept(){
        if(!session_data('userID')){
            echo self::error(lang("please_signin_first"));
            return;
        }
        $data = post();
        $cart_info = $this->carts_model->get_shopping_cart_info(session_data("shopping_cart"));
        if(empty($cart_info)){
            echo self::error(lang("your_cart_is_empty"));
            return;
        }
        if($this->carts_model->insertInfo($cart_info, $data))
            echo self::op_success();
        else
            echo self::op_error();

    }

}
