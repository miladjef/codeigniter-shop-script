<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Home extends SiteController
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->model("suggestion_model");
        $suggested_products = $this->suggestion_model->selectProducts();
        $this->setTemplate("home", array("suggested_products"=>$suggested_products ));
    }


}