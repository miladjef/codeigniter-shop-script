<?php

/**
 * Created by PhpStorm.
 * User: user
 */
class Suggested_Products extends PanelController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("suggestion_model");
        $this->load->model("product_groups_model");
        $this->load->model("products_model");
    }
    
    function index(){
        self::setTemplate("suggested_products" , array("title"=>lang("suggested_products")));
    }


    function insert()
    {
        $data = post();
        if($this->suggestion_model->isRowUnique($data['productGroupsCombo'] , $data['productsCombo'])){
            $info = array(
                "group_id" => $data['productGroupsCombo'],
                "product_id" => $data['productsCombo'],
                "active" => isset($data['active']) ? 1 : 0,
            );
            if ($this->suggestion_model->insertData($info))
                echo self::op_success();
            else
                echo self::op_error();
        }
        
    }

    function update()
    {
        $data = post();
       
        $info = array(
            "group_id" => $data['productGroupsCombo'],
            "product_id" => $data['productsCombo'],
            "active" => isset($data['active']) ? 1 : 0,
        );

        if ($this->suggestion_model->updateData($info, ['id' => $data['id']]))
            echo self::op_success();
        else
            echo self::op_error();
    }


    function delete()
    {
        $data = post();
        if ($this->suggestion_model->deleteData(array("id" => $data['id'])))
            echo self::op_success();
        else
            echo self::op_error();

    }

    function getInfo()
    {
        $data = $this->suggestion_model->selectData();
        $table = "";
        foreach ($data as $row) {
            $groupInfo = $this->product_groups_model->getGroupInfo($row['group_id']);
            $productInfo = $this->products_model->getProductInfo($row['product_id']);

            $table .= "<tr>
                            <td>" . $groupInfo['name'] . "</td>
                            <td>" . $productInfo['name'] . "</td>
                            <td>" . (($row['active']) ? lang("yes") : lang('no')) . "</td>
                            <td><i class='glyphicon glyphicon-pencil' id='" . $row['id'] . "'></i></td>
                            <td><i class='glyphicon glyphicon-erase' id='" . $row['id'] . "'></i></td> 
                        </tr>";
        }

        echo $table;
    }

    function getSuggestionInfo()
    {
        $data = post();
        echo json_encode($this->suggestion_model->getInfo($data['id']));
    }

}