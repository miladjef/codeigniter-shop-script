<?php

/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 9/30/2016
 * Time: 3:03 PM
 */
class Manage_Manufacturers extends PanelController
{
    protected $destFolder = "";
    protected $destURL = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model("manufacturers_model");
        $this->destFolder = FCPATH.config("upload_images_path")."brands/";
        $this->destURL = base_url().config("upload_images_path")."brands/";
    }
    
    function index(){
        $this->setTemplate("manage_manufacturers" , array("title"=>lang("manage_manufacturers")));
    }

    function insert(){
        $data = post();
        $picName = ""; $ext ="";
        if($_FILES['file'] && $_FILES['file']['name']!=""){
            $file = $_FILES['file'];
            $picName = time();
            $ext = strtolower(self::find_file_extension($file));
            self::uploadPicture($file , $picName , $this->destFolder);
        }
        $info = array(
            "name" => $data['name'],
            "date_add" => time(),
            "date_update" => 0,
            "active" => isset($data['active'])?1:0,
            "logo"=>$picName,
            "ext"=>$ext
        );
        if($this->manufacturers_model->insertData($info))
            echo self::op_success();
        else
            echo self::op_error();
    }

    function update(){
        $data = post();
        $picName = ""; $ext ="";
        $picUploaded = false;
        if(isset($_FILES['file']) && $_FILES['file']['name']!=""){
            $file = $_FILES['file'];
            $picName = time();
            $ext = strtolower(self::find_file_extension($file));
            self::uploadPicture($file , $picName , $this->destFolder);
            self::delete_pictures($data['id']);
            $picUploaded = true;
        }
        $info = array(
            "name" => $data['name'],
            "date_add" => time(),
            "date_update" => 0,
            "active" => isset($data['active'])?1:0,
        );

        if($picUploaded){
            $info['logo'] =$picName;
            $info['ext'] = $ext;
        }
        if($this->manufacturers_model->updateData($info , ['id'=>$data['id']]))
            echo self::op_success();
        else
            echo self::op_error();
    }


    function delete_pictures($brand_id){
        $brandInfo = $this->manufacturers_model->getBrandInfo($brand_id);
        foreach($this->sizes as $size)
        {
            if(file_exists($this->destFolder.$brandInfo['logo']."_".$size.".".$brandInfo['ext']))
                unlink($this->destFolder.$brandInfo['logo']."_".$size.".".$brandInfo['ext']);
        }
    }

    function delete(){
        $data = post();
        if($this->manufacturers_model->hasProducts($data['id'])){
            echo self::error(lang("this_brand_has_some_products_you_can_not_delete"));
        }else{
            //deleting files
            self::delete_pictures($data['id']);
            if($this->manufacturers_model->deleteData(array("id"=>$data['id'])))
                echo self::op_success();
            else
                echo self::op_error();
        }
    }
    
    function getInfo(){
        $data = $this->manufacturers_model->selectData();
        $table = "";
        foreach ($data as $row){
            $table .= "<tr>
                        <td>".$row['name']."</td>
                        <td><img class='table_img' src='".$this->destURL.$row['logo']."_60".".".$row["ext"]."'/></td>
                        <td>".(($row['active'])?lang("yes"):lang('no'))."</td>
                        <td><i class='glyphicon glyphicon-pencil' id='".$row['id']."'></i></td>
                        <td><i class='glyphicon glyphicon-erase' id='".$row['id']."'></i></td> 
                
                        </tr>";
        }
        
        echo $table;
    }

    function getBrandInfo(){
        $data = post();
        echo json_encode($this->manufacturers_model->getBrandInfo($data['id']));
    }
}