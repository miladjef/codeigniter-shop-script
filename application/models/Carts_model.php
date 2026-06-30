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
        if(!is_array($shopping_cart) || empty($shopping_cart)){
            return $info;
        }

        foreach($shopping_cart as $key =>$pr){
            $product_id = (int)$key;
            $quantity = max(1, (int)$pr);

            $prSQL = "select pr.id prId ,pr.name name , pr.price , pr.code prCode , prg.name group_name from ".$this->tables['products']." pr
                inner join ".$this->tables['product_groups']." prg on prg.id = pr.group_id
                where pr.id = ?";
            $rows = self::sp($prSQL, array($product_id));
            if(empty($rows)){
                continue;
            }
            $prInfo = current($rows);
            $prInfo['q'] = $quantity;
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
            $quantity = isset($info['q']) ? (int)$info['q'] : 1;
            $total_price += ((float)$info['price'] * max(1, $quantity));
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
                'shipping_method_id' =>isset($data['shippingCombo']) ? (int)$data['shippingCombo'] : 0
            )
        );

    }
}