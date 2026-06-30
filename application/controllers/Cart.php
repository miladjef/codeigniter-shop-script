<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Cart extends SiteController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("products_model");
        $this->load->model("carts_model");
    }

    public function index(){
        $info = array();
        if(session_data('shopping_cart')){
            $info = self::shopping_cart_info();
        }
        $this->setTemplate("cart" , array("info" => $info));
    }
    /****
     * @param $productId
     * @param int $quantity
     */
    public function add2Cart($productId, $quantity = 1)
    {
        $productId = (int)$productId;
        $quantity = max(1, (int)$quantity);
        $shopping_cart = array();
        if ($productId != 0 && $this->products_model->isProductExists($productId)) {

            if ($this->session->userdata('shopping_cart')) {
                //if session exists we add new product id to our session
                $shopping_cart = session_data('shopping_cart');
                if(!is_array($shopping_cart)){
                    $shopping_cart = array();
                }
            }
            $shopping_cart[$productId] = isset($shopping_cart[$productId]) ? ((int)$shopping_cart[$productId] + $quantity) : $quantity;
            $this->session->set_userdata('shopping_cart', $shopping_cart);
        }
        echo true;
    }

    private function shopping_cart_info(){
        $shopping_cart = session_data('shopping_cart');
        return $this->carts_model->get_shopping_cart_info($shopping_cart);
    }

    public function refreshCart(){
        $data = post();
        $shopping_cart = session_data("shopping_cart");
        if(!is_array($shopping_cart)){
            $shopping_cart = array();
        }
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        $quantity = isset($data['q']) ? max(1, (int)$data['q']) : 1;
        if($id > 0){
            $shopping_cart[$id] = $quantity;
            $this->session->set_userdata("shopping_cart", $shopping_cart);
        }
        echo true;
    }

    /****
     *
     */
    public function deleteCartItem(){
        $data = post();
        $shopping_cart = session_data("shopping_cart");
        if(!is_array($shopping_cart)){
            $shopping_cart = array();
        }
        $id = isset($data['id']) ? (int)$data['id'] : 0;
        if($id > 0 && isset($shopping_cart[$id])){
            unset($shopping_cart[$id]);
        }
        $this->session->set_userdata("shopping_cart", $shopping_cart);
        echo true;
    }

    

}