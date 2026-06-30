<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Shipping_Methods extends PanelController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("shipping_model");
    }
    
    function index(){
        self::setTemplate("shipping_methods" , array("title"=>lang("shipping_methods")));
    }

    function insert(){
        $data = post();
        $info = array(
            "name" => $data['name'],
            "description" => $data['description'],
            "active" => isset($data['active']) ? 1 : 0,
        );
        if ($this->shipping_model->insertData($info))
            echo self::op_success();
        else
            echo self::op_error();

    }
    function update(){
        $data = post();
        $info = array(
            "name" => $data['name'],
            "description" => $data['description'],
            "active" => isset($data['active']) ? 1 : 0,
        );

        if ($this->shipping_model->updateData($info, ['id' => $data['id']]))
            echo self::op_success();
        else
            echo self::op_error();

    }
    function delete(){
        $data = post();
        if ($this->shipping_model->deleteData(array("id" => $data['id'])))
            echo self::op_success();
        else
            echo self::op_error();

    }

    function getInfo(){
        $data = $this->shipping_model->selectData();
        $table = "";

        foreach ($data as $row) {
           
            $table .= "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $row['description'] . "</td>
                        <td>" . (($row['active']) ? lang("yes") : lang('no')) . "</td>
                        <td><i class='glyphicon glyphicon-pencil' id='" . $row['id'] . "'></i></td>
                        <td><i class='glyphicon glyphicon-erase' id='" . $row['id'] . "'></i></td> 
               
                        </tr>";
        }

        echo $table;
    }

    function getShippingInfo()
    {
        $data = post();
        echo json_encode($this->shipping_model->getShippingInfo($data['id']));
    }
}