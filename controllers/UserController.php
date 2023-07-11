<?php

session_start();

function user_controller_login() {
    render(VIEW_DIR.'/user/login.php');
}

function user_controller_logout() {
    session_destroy();
    header("Location: index.php");
}

function user_controller_auth($request) {
    if(isset($request['password'])){
        require_once(MODEL_DIR.'/user.php');
        user_model_auth($request);
    } else {
        header("Location: ?msg=10");
    }

}

function user_controller_create($request) {
    require(SECURE_DIR);
    require_once(MODEL_DIR.'/user.php');
    user_model_store($request);
    header("Location: index.php");

}

?>