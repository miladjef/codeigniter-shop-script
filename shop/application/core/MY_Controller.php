<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**************************************
 * Created by PhpStorm.
 * Author: Faradars
 * All Rights Reserved for Itek Company
 **************************************/

/**
 * Class MY_Controller
 * the main controller that consists of all controllers common methods
 */
class MY_Controller extends CI_Controller
{

    protected $tables;
    protected $table = '';
    protected $scope = '';
    public $url = '';
    protected $sizes = array();

    function __construct()
    {
        parent::__construct();
        $this->lang->load('public', 'fa');
        self::setTables();
        $this->sizes = array(1200, 800, 400, 250, 120, 60);

    }

    /*********************************[[ MY CMS ]]MY_Controller Controller ***************************
     *
     */
    protected function setTables()
    {
        $this->tables = array(
            /**Base Tables**/
            'city' => 'city',
            'config' => 'config',
            'contact' => 'contact',
            'customers' => 'customers',
            'manufacturers' => 'manufacturers',
            'users' => 'users',
            'products' => 'products',
            'product_groups' => 'product_groups',
            'product_pics' => 'product_pics',
            'province' => 'province',
            'shipping_methods' => 'shipping_methods'
        );
    }


    public function uploadPicture($file , $picName , $destination_folder , $allowed_extensions = array("jpg" , "png" , "gif")){
        $a = explode("." , $file['name']);
        $ext = end($a);
        $uploaded = true;
        if(in_array($ext , $allowed_extensions)){
            if(move_uploaded_file($file['tmp_name'] , $destination_folder.$picName."_temp".".".$ext )){
                $config['image_library'] = 'gd2';
                $config['source_image'] = $destination_folder.$picName."_temp".".".$ext ;
                $config['thumb_maker'] = "";
                $config['create_thumb'] = False;
                $config['quality'] = '80%';
                $config['maintain_ratio'] = True;
                if($this->image_lib->resize()){
                    $this->image_lib->clear();
                    foreach($this->sizes as $size){
                        $config['new_image'] = $destination_folder.$picName."_".$size.".".$ext;
                        $config['width'] = $size;
                        $this->image_lib->clear();
                        $this->image_lib->initialize($config);
                        if($this->image_lib->resize())
                            continue;
                        else
                            $uploaded = false;
                    }
                    if($uploaded)
                        unlink($destination_folder.$picName."_temp".".".$ext);
                }
            }
        }
        else{
            //echo not valid file
        }
        return $uploaded;
    }
    
    function op_success(){
        return self::success(lang('operation_success'));
    }
    
    function op_error(){
        return self::error(lang('operation_failed'));
    }
    
    
    protected function success($message){
        $result = array("code"=>0 , "message"=>$message);
        return json_encode($result);
    }

    protected function error($message){
        $result = array("code"=>1 , "message"=>$message);
        return json_encode($result);
    }

   
}
