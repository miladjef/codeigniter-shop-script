<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 10/5/2016
 * Time: 6:39 PM
 */
class Manage_Product_Groups extends PanelController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("product_groups_model");
    }

    /***********************************************
     *
     */
    function index()
    {
        $this->setTemplate("manage_product_groups", array("title" => lang("manage_product_groups")));
    }

    /**********************************************
     *
     */
    function insert()
    {
        $data = post();
        $info = array(
            "name" => $data['name'],
            "date_add" => time(),
            "date_update" => 0,
            "active" => isset($data['active']) ? 1 : 0,
        );
        if ($this->product_groups_model->insertData($info))
            echo self::op_success();
        else
            echo self::op_error();
    }

    /*****************************************************
     *
     */
    function update()
    {
        $data = post();

        $info = array(
            "name" => $data['name'],
            "date_update" => time(),
            "active" => isset($data['active']) ? 1 : 0,
        );


        if ($this->product_groups_model->updateData($info, ['id' => $data['id']]))
            echo self::op_success();
        else
            echo self::op_error();
    }

    /********************************************************8
     *
     */
    function delete()
    {
        $data = post();
        if ($this->product_groups_model->deleteData(array("id" => $data['id'])))
            echo self::op_success();
        else
            echo self::op_error();

    }

    /********************************************************8
     *
     */
    function getInfo()
    {
        $data = $this->product_groups_model->selectData();
        $table = "";
        foreach ($data as $row) {
            $table .= "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . (($row['active']) ? lang("yes") : lang('no')) . "</td>
                        <td><i class='glyphicon glyphicon-pencil' id='" . $row['id'] . "'></i></td>
                        <td><i class='glyphicon glyphicon-erase' id='" . $row['id'] . "'></i></td> 
               
                        </tr>";
        }

        echo $table;
    }

    /***************************************************************
     * 
     */
    function getGroupInfo()
    {
        $data = post();
        echo json_encode($this->product_groups_model->getGroupInfo($data['id']));
    }
}