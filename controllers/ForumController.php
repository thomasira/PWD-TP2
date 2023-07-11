<?php
session_start();
function forum_controller_index($request) {
    require_once(MODEL_DIR.'/forum.php');
    $data = forum_model_myList($request);
    render(VIEW_DIR.'/forum/myArticles.php', $data);
}

function forum_controller_create() {
    require(SECURE_DIR);
    render(VIEW_DIR.'/forum/create.php');
}

function forum_controller_edit($request) {
    if(isset($request['id'])){
        require_once(MODEL_DIR.'/forum.php');
        $data = forum_model_readArticle($request);
        render(VIEW_DIR.'/forum/edit.php', $data);
    } else {
        header("Location: ?msg=10");
    }

}

function forum_controller_update($request) {
    require(SECURE_DIR);
    require_once(MODEL_DIR.'/forum.php');
    $isValid = validateArticle($request);
    if($isValid){
        forum_model_update($request);
        header("Location: ?module=forum&action=index");
    }
    else header("Location: ?module=forum&action=edit&msg=1");
}


function forum_controller_delete() {
    require(SECURE_DIR);
    require_once(MODEL_DIR.'/forum.php');
    forum_model_delete();
    header("Location: ?module=forum&action=index");
}


function forum_controller_store($request) {
    require(SECURE_DIR);
    require_once(MODEL_DIR.'/forum.php');

    $isValid = validateArticle($request);
    if($isValid){
        forum_model_store($request);
        header("Location: ?module=forum&action=index");
    }
    else header("Location: ?module=forum&action=create&msg=1");
}


?>