<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Product extends SiteController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("products_model");
        $this->load->model("product_pictures_model");
        $this->load->model("common_model");
    }

    function detail($prId){
        $this->common_model->add_hit($prId);
        $productInfo = $this->products_model->getProductDetails($prId);
        $productPictures = $this->product_pictures_model->productPictures($prId);
        self::setTemplate('product_details' , array("title"=>$productInfo['name'] , "prInfo"=>$productInfo , "pics"=>$productPictures));
    }

}