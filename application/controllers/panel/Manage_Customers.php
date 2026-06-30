<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Manage_Customers extends PanelController 
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("customers_model");
    }
    
    
    function index(){
        $this->setTemplate("manage_customers", array("title" => lang("manage_customers")));
    }

    function getInfo()
    {
        $data = $this->customers_model->selectData();
        $table = "";
        foreach ($data as $row) {
            
            $table .= "<tr>
                            <td>".$row['name']."</td>
                            <td>".$row['last_name']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row['province']."</td>
                            <td>".$row['city']."</td>
                          
                            <td><i class='glyphicon glyphicon-eye-open' id='" . $row['id'] . "'></i></td>
                        </tr>";
        }

        echo $table;
    }

}