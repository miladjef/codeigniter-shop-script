<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Manage_Orders extends PanelController 
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("orders_model");
    }
    
    
    function index(){
        $this->setTemplate("manage_orders", array("title" => lang("manage_orders")));
    }

    function getInfo()
    {
        $data = $this->orders_model->selectData();
        $table = "";
        foreach ($data as $row) {
            
            $table .= "<tr>
                            <td>".$row['customer']."</td>
                            <td>".$row['products']."</td>
                            <td>".$row['order_status']."</td>
                            <td>".$row['payment_status']."</td>
                            <td>".$row['price']."</td>
                            <td>".$row['discounts']."</td>
                            <td>".$row['total_price']."</td>
                            <td>".$this->jdf->jdate("Y/m/d H:i", $row['time'])."</td>
                            <td><i class='glyphicon glyphicon-pencil' id='" . $row['id'] . "'></i></td>
                        </tr>";
        }

        echo $table;
    }

}