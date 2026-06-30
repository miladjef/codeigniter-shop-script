<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Orders_Model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = $this->tables['orders'];
    }
     function selectData(){
         $sql = "Select
         ord.* , 
         CONCAT_WS(' ' , cu.name , cu.last_name) customer,
         ors.name order_status,
         pym.name payment_status,
         ct.products products
        
         FROM ".$this->table." ord
         inner join ".$this->tables['customers']." cu on ord.customer_id = cu.id
         inner join ".$this->tables['carts']." ct on ord.cart_id = ct.id
         inner join ".$this->tables['orders_status']." ors on ord.order_state = ors.id
         inner join ".$this->tables['payments']." pym on ord.order_payment_id = pym.id";
         
         $data = self::sp($sql);
         for($i=0 ; $i<count($data);$i++){
             $products = json_decode($data[$i]['products']);
             $productArr = [];
             foreach($products as $prId=>$count){
                 $product = self::getRow($this->tables['products'] , array("id"=>$prId));
                 $productArr[] = $product['name']." : ".$count." ".lang('number');
             }
             $data[$i]['products'] = implode("-" , $productArr);
         }
         return $data;
     }
    
}