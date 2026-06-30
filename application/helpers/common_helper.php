<?php
/**
 * Created by PhpStorm.
 * User: faraDars
 * Date: 9/29/2016
 * Time: 6:39 PM
 */

function lang($word){
    $ci = &get_instance();
    return $ci->lang->line($word);
}

function config($item){
    $ci = &get_instance();
    return $ci->config->item($item);
}

function post(){
    $ci = &get_instance();
    return $ci->input->post();
}

function get(){
    $ci = &get_instance();
    return $ci->input->get();
}

function textbox($label , $name , $width="big" , $id="" , $value=""){
    $id= ($id=='')?$name:$id;
    $label_width = ($width=='big')?'col-md-3':'col-md-5';
    $input_width = ($width=='big')?'col-md-4':'col-md-7';
    $label = add_asterisk($label);
    return "<div class='form_group'>
        <label class='".$label_width." control-label'>".$label."</label>
        <div class='".$input_width."'>
            <input type='text' value='".$value."' id='".$id."' name='".$name."' class='form-control'/>
        </div>
        </div>";
}

function add_asterisk($label){
    if(strpos($label, "__*")){
        $label = str_replace("__*" , "" , $label);
        return ($label."<span class='asterisk'>*</span>");
    }
    else
        return $label;
}

if(! function_exists('combo')){
    function combo($label , $name  , $width ='big' ,  $id ='' , $value = '' , $options = array()){
        $id = ($id=='')?$name:$id;
        $class = "form-control chosen-select ".((!empty($options)) && isset($options['second_id']) && $options['second_id']!=''?" ".$options['second_id']." ":'');

        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-4':'col-sm-7';
        $label = add_asterisk($label);
        $placeholder = lang('please_choose_an_item');
        $multiple = ((isset($options['multiple']) && $options['multiple']==1)?'multiple' :'');
        $combo = "<div class='form-group'>
                    <label class='".$label_width." control-label'>".$label."</label>
                    <div class='".$input_width."'>
                        <select  name='".$name."'  id='".$id."' $multiple class= '".$class."' data-placeholder='".$placeholder."'";



        //adding default value for combo
        if($value!='')
            $combo .= ' data-value="'.$value.'"';

        $combo .=">";
        if(isset($options['lang']) && $options['lang']!=''){
            $lang = $options['lang'];
            // Call a function of the model
            $combo.= combo_lang($options['loader_func'] , $lang);
        }
        $combo .="</select>
                    </div>
                </div>";

        return $combo;
    }
}
/*****************************************************************
 * this method is an alias for function: $this->input->post()
 */

/*****************************************************************
 * this method is an alias for function: $this->config->item()
 */
if(! function_exists('session_data')){
    function session_data($data){
        $ci = &get_instance();
        return $ci->session->userdata($data);
    }
}

/*****************************************************************
 * this method is used for creating hidden input
 * @param $params ('n'=>name , 'id'=>id ,  'v'=>value)
 */
if(!function_exists('hiddenbox')){
    function hiddenbox($params){
        if(is_array($params)){
            $name = (isset($params['n']))?$params['n']:'';
            $id = (isset($params['id']))?$params['id']:$params['n'];
            $value = (isset($params['v']))?$params['v']:'';

            return "<input type='hidden' name='".$name."' id='".$id."' value='".$value."'/>";
        }
        else
            return null;
    }
}

/********************************************************************
 * this function is used for creating a checkbox by getting:
 * @param label: the checkbox label
 * @param name: the checkbox name
 * @param id : the checkbox id
 */
if(! function_exists('checkbox')){
    function checkbox($label , $name , $width='big',$id='' , $class=''){
        $id = ($id=='')?$name:$id;
        $width = ($width=='big')?'col-sm-4':'col-sm-6';
        $label = add_asterisk($label);
        return "<div class='form-group'>
                        <div class='row'>
                            <div class='".$width."'>
                                <div class='ckbox ckbox-default'>
                                    <input type='checkbox' id='".$id."' name='".$name."' class='".$class."' value='0'/>
                                    <label for='".$id."'>".$label."</label>
                                </div>
                            </div>
                        </div>
                    </div>";
    }
}

/*****************************************************************
 * @param $params ('n'=>name , 'id'=>id , 's1'=>label_size , 's2'=>input_size , 'l'=>label)
 */
if(!function_exists('submit_reset')){
    function submit_reset($button_type = 'button'){
        return "<div class='form-group'>
                    <button type='".$button_type."' id='submit' class='btn btn-primary'>".lang('submit')."</button>
                    <button type='reset' id='reset' class='btn btn-default'>".lang('reset_form')."</button>
                </div>";
    }
}

/*****************************************************************
 * this method adds a labelbox
 */
if(!function_exists('labelbox')){
    function labelbox($label , $id , $width='big' ,$defaultValue='', $class =''){
        $label = add_asterisk($label);
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-3':'col-sm-7';

        return "<div class='form-group'>
                    <label class='".$class." ".$label_width." control-label'>".$label."</label>
                    <label class='".$class." ".$input_width." control-label' id=".$id.">".$defaultValue."</label>
               </div>";
    }
}

/*****************************************************************
 * this method adds a button
 */
if(!function_exists('button')){
    function button($name , $value  , $type='button' , $class ='btn btn-primary'){
        return '<div class="col-sm-12 col-sm-offset-3 left">
        <button type="'.$type.'" id="'.$name.'" name="'.$name.'"  class="'.$class.'">'.$value.'</button>
        </div>';
    }
}
/*****************************************************************
 * this method adds a file input
 */
if(!function_exists('filebox')){
    function filebox($label , $name , $width='big' , $id = ''){
        $id = ($id=='')?$name:$id;
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-9':'col-sm-7';
        $label = add_asterisk($label);
        return "
        <div class='form-group'>
            <label class='".$label_width." control-label'>".$label."</label>
            <div class='".$input_width."'>
                <div class='fileupload fileupload-new' data-provides='fileupload'>
                    <div class='input-append'>
                        <div class='uneditable-input'>
                            <span class='fileupload-preview'></span>
                        </div>
                        <span class='btn btn-default btn-file'>
                            <span class='fileupload-new'>".lang('select_file')."</span>
                            <span class='fileupload-exists'>".lang('change')."</span>
                            <input type='file' id='".$id."' name='".$name."'>
                        </span>
                        <a href='#' class='btn btn-default fileupload-exists' data-dismiss='fileupload'>".lang('delete')."</a>
                    </div>
                </div>
              </div>
            </div>";
    }
}

/********************************************************************
 *
 */
if ( ! function_exists('emailbox')) {
    function emailbox($label , $name  , $width='big' ,$id ='' , $value=''){
        $id = ($id=='')?$name:$id;
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-4':'col-sm-7';
        $label = add_asterisk($label);
        return "<div class='form-group'>
                    <label class='".$label_width." control-label'>".$label."</label>
                    <div class='".$input_width."'>
                  <input type='text' name='".$name."' id='".$id."' placeholder='example@site.com' class='form-control left' value='".$value."'>
                    </div>
              </div>";
    }
}

/********************************************************************
 *
 */
if ( ! function_exists('textarea')) {
    function textarea($label , $name  , $width='big' ,$id ='' , $value=''){
        $id = ($id=='')?$name:$id;
        $input_width = ($width=='big')?'col-sm-8':'col-sm-12';
        $label = add_asterisk($label);
        return "<div class='".$input_width."'>
						<label>".$label."</label>
						<textarea name='".$name."' id='".$id."' cols='10' rows='3' class='form-control'>".$value."</textarea>
					</div>";
    }
}

/********************************************************************
 *
 */
if ( ! function_exists('passwordbox')) {
    function passwordbox($label , $name  , $width='big', $id ='' , $value=''){
        $id = ($id=='')?$name:$id;
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-4':'col-sm-7';
        $label = add_asterisk($label);
        return "<div class='form-group'>
                    <label class='".$label_width." control-label'>".$label."</label>
                    <div class='".$input_width."'>
                  <input type='password' name='".$name."' id='".$id."' placeholder='' value='".$value."' class='form-control left'>
                    </div>
              </div>";
    }
}

/********************************************************************
 * this function creates a title with a line
 */
if(!function_exists('title_line')){
    function title_line($label){
        return '<div class="subtitle subtitle-lined">'.$label.'</div>';
    }
}
/********************************************************************
 *
 */
if ( ! function_exists('numbermask')) {
    function numbermask($label , $mask , $name  ,$width= 'big', $id ='' , $value=''){
        $id = ($id=='')?$name:$id;
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-4':'col-sm-7';
        $label = add_asterisk($label);
        return "<div class='form-group'>
                    <label class='".$label_width." control-label'>".$label."</label>
                    <div class='".$input_width."'>

                            <input type='text' value='".$value."' name='".$name."' id='".$id."' class='form-control left'>

                        <script>
                            $(function(){
                                $('#".$id."').mask('".$mask."');
                            });
                        </script>
                    </div>
              </div>";
    }
}

/************************************* Common Helper *******************************
 *
 */
if ( ! function_exists('numberbox')) {
    function numberbox($label , $name , $width='big' ,$id ='' , $value=''){
        $id = ($id=='')?$name:$id;
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-4':'col-sm-7';
        $label = add_asterisk($label);
        return "<div class='form-group'>
                    <label class='".$label_width." control-label'>".$label."</label>
                    <div class='".$input_width."'>
                        <input type='text' id='".$id."' name='".$name."' value='".$value."' size='20' class='form-control left'>
                    </div>
              </div>";
    }
}


/************************************* Common Helper *******************************
 *
 */
if(!function_exists('submit_clear_buttons')){
    function submit_clear_buttons($button_id = 'submit' , $reset_id = 'reset' , $submit_text = '' , $reset_text = ''){
        $submit_text = ($submit_text=='')?lang('submit'):$submit_text;
        $reset_text = ($reset_text=='')?lang('reset_form'):$reset_text;
        return "
        <div class='col-md-12'>
                <button type='button' id='".$button_id."' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>".$submit_text."</button>
                <button type='reset' id='".$reset_id."' class='btn btn-default'>".$reset_text."</button>
                <input type='hidden' name='id' id='id' value='' />
        </div>";
    }
}

/*****************************************************************
 * @param
 */
if(!function_exists('editorbox')){
    function editorbox($label , $name , $width='big' ,$id ='' , $value =''){
        $id = ($id=='')?$name:$id;
        $label_width = ($width=='big')?'col-sm-6':'col-sm-12';
        $input_width = ($width=='big')?'col-sm-6':'col-sm-12';
        $label = add_asterisk($label);
        return "<div class='form-group'>
                    <div  class='".$label_width."'>".$label."</div>
                    <div  class='".$input_width."'>
                        <textarea id='".$id."' name='".$name."' class='ckeditor'>".$value."</textarea>
                        </div>
                    </div>";
    }

}


/**
 *
 */
if(!function_exists('datebox')) {
    function datebox($label, $date_id , $width='big' , $value = '')
    {
        $label = add_asterisk($label);
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-4':'col-sm-7';
        return "
                <div class='form-group'>
                    <label class='".$label_width." control-label'>" . $label . "</label>
                    <div class='".$input_width."'>
                        <input class='form-control date_input' id='" . $date_id . "' value='".$value."' name='".$date_id."' type='text'>
                        <div  class='date_btn' id='" . $date_id . "_btn'></div>
                    </div>
              </div>

                <script>
                $(function(){
                     Calendar.setup({
                        inputField: '" . $date_id . "',
                        button: '" . $date_id . "_btn',
                        ifFormat: '%Y/%m/%d',
                        dateType: 'jalali'
                        });
                });
                </script>";
    }
}

if(!function_exists('colorbox')){
    function colorbox($label , $name , $width='big' , $value=''){
        $label_width = ($width=='big')?'col-sm-3':'col-sm-5';
        $input_width = ($width=='big')?'col-sm-4':'col-sm-7';
        $label = add_asterisk($label);
        return "
                <div class='form-group'>
                    <label class='".$label_width." control-label'>".$label."</label>

                    <div class='".$input_width."'>
                        <div class='input-group color' data-color='".$value."' data-color-format='rgb' id='".$name."'>
                            <input class='form-control colorbox left' name='".$name."' id='".$name."' value='".$value."' readonly='' type='text'>
                            <span class='input-group-addon'><i style='background-color:".$value."'></i></span>
                        </div>
                    </div>
                </div>
                <script>
                    $(function(){ $('#".$name."').colorpicker({format:'rgb'}); });
                </script>";
    }
}



