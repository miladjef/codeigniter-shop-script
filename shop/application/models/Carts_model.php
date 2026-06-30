<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Carts_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = $this->tables['carts'];
    }

    function get_shopping_cart_info($shopping_cart){
        $info = array();
        foreach($shopping_cart as $key =>$pr){

            $prSQL = "select pr.id prId ,pr.name name , pr.price , pr.code prCode , prg.name group_name from ".$this->tables['products']." pr
                inner join ".$this->tables['product_groups']." prg on prg.id = pr.group_id
                where pr.id = ".$key;
            $prInfo = current(self::sp($prSQL));
            $prInfo['q'] = $pr;
            $info[] = $prInfo;
        }
        return $info;
    }


    public function insertInfo($cartInfo , $data){
        //inserting cart info
        $cart = session_data("shopping_cart");
        $last_row = self::insert_by_return($this->table , array("products"=>json_encode($cart)));
        $total_price = 0;
        foreach ($cartInfo as $info){
            $total_price += $info['price'];
        }
        return self::insert(
            $this->tables['orders'],
            array(
                'customer_id'=>session_data("userID"),
                'cart_id'=>$last_row['id'],
                'currency_id'=> 1,
                'order_state'=>1,
                'order_payment_id'=>0,
                'discounts'=>0,
                'price'=> $total_price,
                'total_price'=> $total_price,
                'time'=>time(),
                'shipping_method_id' =>$data['shippingCombo']
            )
        );

    }
}