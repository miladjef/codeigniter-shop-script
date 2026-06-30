<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Category extends SiteController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("product_groups_model");
        $this->load->model("product_pictures_model");
    }

    /***
     * @param $param
     * If your controller contains a function named _remap(), 
     * it will always get called regardless of what your URI contains. 
     * It overrides the normal behavior in which the URI determines which function is called,
     * allowing you to define your own function routing rules
     */
    function _remap($param) {
        $this->index($param);
    }

    
    function index($groupId){
        $products = $this->product_groups_model->selectProducts($groupId);
        $productGroupsInfo = $this->product_groups_model->getGroupInfo($groupId);
        for($i=0 ; $i<count($products);$i++){
            $pictures = $this->product_pictures_model->productPictures($products[$i]['id']);
            if(!empty($pictures)){
                $picture = current($pictures);
                $products[$i]['picture'] = base_url().config("uploads_path")."images/products/".$picture['pic']."_250.".$picture['ext'];
            }else{
                $products[$i]['picture'] = base_url().config("uploads_path")."images/products/default_250.jpg";
            }

        }
        self::setTemplate("category" , array("title"=>lang("products_of_group")."  <b>".$productGroupsInfo['name']."<b>" , "products"=>$products));
    }

}