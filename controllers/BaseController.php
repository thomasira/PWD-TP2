<?php

function base_controller_index() {

    session_start();
    require_once(MODEL_DIR.'/forum.php');
    $data = forum_model_list();

    render(VIEW_DIR.'/base/welcome.php', $data);
}

?>