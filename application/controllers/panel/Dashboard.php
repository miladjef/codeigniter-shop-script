<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Dashboard extends PanelController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }
    
    function index(){
        $this->setTemplate("dashboard" , array("title"=>$this->lang->line("dashboard")));
    }

}