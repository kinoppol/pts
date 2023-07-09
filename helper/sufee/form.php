<?php
function gen_input($arr=array()){
    $form_input='';
    foreach($arr as $row){
        switch($row['type']){
            case 'text'     : $form_input.=gen_input_text_like($row,'text'); break;            
            case 'password' : $form_input.=gen_input_text_like($row,'password'); break;   
            case 'number'   : $form_input.=gen_input_text_like($row,'number'); break;   
            case 'date'     : $form_input.=gen_input_text_like($row,'date'); break;   
            case 'email'    : $form_input.=gen_input_text_like($row,'email'); break;   
            case 'file'    : $form_input.=gen_input_text_like($row,'file'); break;   
            case 'hidden'   : $form_input.=gen_input_hidden($row); break;   
            case 'submit'   : $form_input.=gen_input_submit($row,empty($row['color'])?'primary':$row['color']); break;   
            case 'select'   : $form_input.=gen_input_select($row); break;   
        }
    }
    return $form_input;
}

function gen_input_text_like($input,$type='text'){
    $attr='';
    if(!empty($input['attr'])){
        $attr=' ';
        foreach($input['attr'] as $k=>$v){
            $attr.=$k.'="'.$v.'"';
        }
    }
    $class='form-control';
    if($type=='file'){
        $class='form-control-file';
    }
    $ret='<div class="row form-group">
    <div class="col col-md-4"><label for="'.$input['id'].'" class=" form-control-label">'.$input['label'].'</label></div>   
    <div class="col-12 col-md-8"><input type="'.$type.'" id="'.$input['id'].'" name="'.$input['id'].'" placeholder="'.(!empty($input['placeholder'])?$input['placeholder']:'').'" class="'.$class.'" value="'.(isset($input['def'])?$input['def']:'').'" '.$attr.' '.(!empty($input['required'])?'required':'').'>'.(
        !empty($input['hint'])?'<small class="form-text text-muted">'.$input['hint'].'</small>':''
    ).'</div>
    </div>';
    return $ret;
}

function gen_input_hidden($input){
    $ret='<input type="hidden" name="'.$input['id'].'" id="'.$input['id'].'" value="'.(isset($input['def'])?$input['def']:'').'">';
    return $ret;
}



function gen_input_submit($input,$color='primary'){
    $ret='<div class="row form-group">
    <div class="col col-md-4"><label for="'.$input['id'].'" class=" form-control-label"></label></div>   
    <div class="col-12 col-md-8"><button type="submit" id="'.$input['id'].'" class="btn btn-'.$color.'">'.$input['label'].'</button>'.(
        !empty($input['hint'])?'<small class="form-text text-muted">'.$input['hint'].'</small>':''
    ).'</div>
    </div>';
    return $ret;
}

function gen_input_select($input){

    $options=array();
    foreach($input['item'] as $k=>$v){
        $options[$k]=$v;
    }
    $ret='<div class="row form-group">
    <div class="col col-md-4"><label for="'.$input['id'].'" class=" form-control-label">'.$input['label'].'</label></div>  
    <div class="col-12 col-md-8"><select id="'.$input['id'].'" name="'.$input['id'].'" class="form-control" >'.gen_option($options,$input['def']).'</select>'.(
        !empty($input['hint'])?'<small class="form-text text-muted">'.$input['hint'].'</small>':''
    ).'</div>
    </div>';
    systemFoot('<script>
    jQuery(document).ready(function($){ jQuery("#'.$input['id'].'").select2({})
    });
        </script>');
    return $ret;
}