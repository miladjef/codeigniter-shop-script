<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Orders_Status extends PanelController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("order_status_model");
    }
    
    function index(){
        self::setTemplate("orders_status" , array("title"=>lang("orders_status")));
    }

    function insert(){
        $data = post();
        $info = array(
            "name" => $data['name'],
            "description" => $data['description'],
            "active" => isset($data['active']) ? 1 : 0,
        );
        if ($this->order_status_model->insertData($info))
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

        if ($this->order_status_model->updateData($info, ['id' => $data['id']]))
            echo self::op_success();
        else
            echo self::op_error();

    }
    function delete(){
        $data = post();
        if ($this->order_status_model->deleteData(array("id" => $data['id'])))
            echo self::op_success();
        else
            echo self::op_error();

    }

    function getInfo(){
        $data = $this->order_status_model->selectData();
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

    function getOrderStatusInfo()
    {
        $data = post();
        echo json_encode($this->order_status_model->getOrderStatusInfo($data['id']));
    }
}