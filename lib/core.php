<?php

/**
 * rajoute des slashes devant les "" pour éviter la mauvaise injection
 */
function safe($param) {

    return addslashes($param);
}

/**
 * 
 */
function render($file, $data = null) {

    $layout_file = VIEW_DIR.'/layouts/layout.php';
    ob_start();
    include_once($file);
    $content = ob_get_clean();
    include_once($layout_file);
}


function validateDate($date){
    if (preg_match ("/^([0-9]{4})-([0-9]{2})-([0-9]{2})$/", $date, $parts)) {
        if(checkdate($parts[2],$parts[3],$parts[1])) {

            return false;

        } else {

            return true;
        } 

    }else{

        return true;
    }
}

function validateArticle($request) {

    $isValid = true;

    foreach($request as $key => $value){
        print_r($request);
    
        if($key == 'title'){
            if(strlen($value)< 5 || strlen($value)>100) {
                $isValid = false;
            }
        } elseif($key == 'article') {
            if(strlen($value) > 1000 || strlen($value) == 0) {
                $isValid = false;
            }
        }
    }
    return $isValid;
}
?>