<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Manage_Products extends PanelController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("products_model");
        $this->load->model("product_groups_model");
        $this->load->model("manufacturers_model");
    }
    
    function index(){
        self::setTemplate("manage_products" , array("title"=>lang("manage_products")));
    }

    function insert(){
        $data = post();
        $info = array(
            "name" => $data['name'],
            "group_id" => $data['productGroupsCombo'],
            "manufacturer_id" => $data['productBrandsCombo'],
            "price" => $data['price'],
            "code" => $data['code'],
            "description" => $data['description'],
            "date_add" => time(),
            "active" => isset($data['active']) ? 1 : 0,
        );
        if ($this->products_model->insertData($info))
            echo self::op_success();
        else
            echo self::op_error();

    }
    function update(){
        $data = post();

        $info = array(
            "name" => $data['name'],
            "group_id" => $data['productGroupsCombo'],
            "manufacturer_id" => $data['productBrandsCombo'],
            "price" => $data['price'],
            "code" => $data['code'],
            "description" => $data['description'],
            "date_add" => time(),
            "active" => isset($data['active']) ? 1 : 0,
        );

        if ($this->products_model->updateData($info, ['id' => $data['id']]))
            echo self::op_success();
        else
            echo self::op_error();

    }
    function delete(){
        $data = post();
        if ($this->products_model->deleteData(array("id" => $data['id'])))
            echo self::op_success();
        else
            echo self::op_error();

    }

    function getInfo(){
        $data = $this->products_model->selectData();
        $table = "";

        foreach ($data as $row) {
            $groupInfo = $this->product_groups_model->getGroupInfo($row['group_id']);
            $brandInfo = $this->manufacturers_model->getBrandInfo($row['manufacturer_id']);
            $table .= "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $groupInfo['name'] . "</td>
                        <td>" . $brandInfo['name'] . "</td>
                        <td>" . $row['price'] . "</td>
                        <td>" . $row['code'] . "</td>
                        <td>" . (($row['active']) ? lang("yes") : lang('no')) . "</td>
                        <td><i class='glyphicon glyphicon-pencil' id='" . $row['id'] . "'></i></td>
                        <td><i class='glyphicon glyphicon-erase' id='" . $row['id'] . "'></i></td> 
               
                        </tr>";
        }

        echo $table;
    }

    function getProductInfo()
    {
        $data = post();
        echo json_encode($this->products_model->getProductInfo($data['id']));
    }
}