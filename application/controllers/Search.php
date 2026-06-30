<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Search extends SiteController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("common_model");
    }

    function _remap($param) {
        $this->index($param);
    }
    
    function index($searchVal){
        $result = $this->common_model->searchResult($searchVal);
        self::setTemplate("search" , array("title"=>lang("the_search_result_of")." ".$searchVal , "result"=>$result));
    }

}