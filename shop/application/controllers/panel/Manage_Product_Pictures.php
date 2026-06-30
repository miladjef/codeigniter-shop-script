<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 */
class Manage_Product_Pictures extends PanelController
{
    protected $destFolder = "";
    protected $destURL = "";

    function __construct()
    {
        parent::__construct();
        $this->load->model("product_pictures_model");
        $this->load->model("product_groups_model");
        $this->load->model("products_model");
        $this->destFolder = FCPATH . config("upload_images_path") . "products/";
        $this->destURL = base_url() . config("upload_images_path") . "products/";
    }

    function index()
    {
        $this->setTemplate("manage_product_pictures", array("title" => lang("manage_product_pictures")));
    }

    function insert()
    {
        $data = post();
        $picName = "";
        $ext = "";
        if ($_FILES['file'] && $_FILES['file']['name'] != "") {
            $file = $_FILES['file'];
            $picName = time();
            $ext = strtolower(self::find_file_extension($file));
            self::uploadPicture($file, $picName, $this->destFolder);
        }
        $info = array(
            "name" => $data['name'],
            "active" => isset($data['active']) ? 1 : 0,
            "group_id" => $data['productGroupsCombo'],
            "product_id" => $data['productsCombo'],
            "pic" => $picName,
            "ext" => $ext
        );
        if ($this->product_pictures_model->insertData($info))
            echo self::op_success();
        else
            echo self::op_error();
    }

    function update()
    {
        $data = post();
        $picName = "";
        $ext = "";
        $picUploaded = false;
        if (isset($_FILES['file']) && $_FILES['file']['name'] != "") {
            $file = $_FILES['file'];
            $picName = time();
            $ext = strtolower(self::find_file_extension($file));
            self::uploadPicture($file, $picName, $this->destFolder);
            self::delete_pictures($data['id']);
            $picUploaded = true;
        }
        $info = array(
            "name" => $data['name'],
            "active" => isset($data['active']) ? 1 : 0,
            "group_id" => $data['productGroupsCombo'],
            "product_id" => $data['productsCombo']
        );

        if ($picUploaded) {
            $info['pic'] = $picName;
            $info['ext'] = $ext;
        }
        if ($this->product_pictures_model->updateData($info, ['id' => $data['id']]))
            echo self::op_success();
        else
            echo self::op_error();
    }


    function delete_pictures($picture_id)
    {
        $productPictureInfo = $this->product_pictures_model->getProductPictureInfo($picture_id);
        foreach ($this->sizes as $size) {
            if (file_exists($this->destFolder . $productPictureInfo['pic'] . "_" . $size . "." . $productPictureInfo['ext']))
                unlink($this->destFolder . $productPictureInfo['pic'] . "_" . $size . "." . $productPictureInfo['ext']);
        }
    }

    function delete()
    {
        $data = post();
        //deleting files
        self::delete_pictures($data['id']);
        if ($this->product_pictures_model->deleteData(array("id" => $data['id'])))
            echo self::op_success();
        else
            echo self::op_error();

    }

    function getInfo()
    {
        $data = $this->product_pictures_model->selectData();
        $table = "";
        foreach ($data as $row) {
            $groupInfo = $this->product_groups_model->getGroupInfo($row['group_id']);
            $productInfo = $this->products_model->getProductInfo($row['product_id']);

            $table .= "<tr>
                            <td>" . $groupInfo['name'] . "</td>
                            <td>" . $productInfo['name'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td><img class='table_img' src='" . $this->destURL . $row['pic'] . "_60" . "." . $row["ext"] . "'/></td>
                            <td>" . (($row['active']) ? lang("yes") : lang('no')) . "</td>
                            <td><i class='glyphicon glyphicon-pencil' id='" . $row['id'] . "'></i></td>
                            <td><i class='glyphicon glyphicon-erase' id='" . $row['id'] . "'></i></td> 
                        </tr>";
        }

        echo $table;
    }

    function getPictureInfo()
    {
        $data = post();
        echo json_encode($this->product_pictures_model->getProductPictureInfo($data['id']));
    }
}