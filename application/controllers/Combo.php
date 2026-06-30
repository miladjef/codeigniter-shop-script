<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 10/6/2016
 * Time: 8:15 AM
 */
class Combo extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function create_combo($result){
        $options[] = array("value"=>-1 , "text"=>lang("please_choose_an_item"));

        foreach ($result as $option)
            $options[] = array("value"=>$option['id'] , "text"=>$option['name']);

        return json_encode($options);
    }

    function product_groups(){
        $this->load->model("product_groups_model");
        $data = $this->product_groups_model->product_groups_combo();
        echo self::create_combo($data);

    }

    function product_brands(){
        $this->load->model("manufacturers_model");
        $data = $this->manufacturers_model->product_brands_combo();
        echo self::create_combo($data);

    }

    function products($group_id){
        $this->load->model("products_model");
        $data = $this->products_model->product_combo($group_id);
        echo self::create_combo($data);
    }

    public function provinceCombo(){
        $this->load->model("common_model");
        $data = $this->common_model->provinces_combo();
        echo self::create_combo($data);
    }

    public function cityCombo($provinceId){
        $this->load->model("common_model");
        $data = $this->common_model->cities_combo($provinceId);
        echo self::create_combo($data);
    }
    
    public function shippingCombo(){
        $this->load->model("shipping_model");
        $data = $this->shipping_model->shipping_combo();
        echo self::create_combo($data);
    }


}