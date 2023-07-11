<?php


function forum_model_list(){
    require(CONNEX_DIR);
    $sql = "SELECT * FROM tp2_forum INNER JOIN tp2_user ON tp2_user.id = tp2_forum.user_id";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($connex);
    return $result;
}
function forum_model_myList(){
    require(CONNEX_DIR);
    $sessionId = $_SESSION['userId'];
    $sql = "SELECT *, tp2_forum.id as id FROM tp2_forum INNER JOIN tp2_user ON tp2_user.id = tp2_forum.user_id WHERE user_id = '$sessionId'";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($connex);
    return $result;
}
function forum_model_readArticle($request){
    require(CONNEX_DIR);
    $id = $request['id'];
    $sql = "SELECT * FROM tp2_forum WHERE id = '$id'";
    $result = mysqli_query($connex, $sql);
    $result = mysqli_fetch_array($result, MYSQLI_ASSOC);

    mysqli_close($connex);
    return $result;
}

function forum_model_store($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sessionId = $_SESSION['userId'];
    $sql = "INSERT INTO tp2_forum(title, article, date, user_id) VALUES ('$title', '$article', '$date', '$sessionId')";

    mysqli_query($connex, $sql);
    mysqli_close($connex);
}

function forum_model_update($request){
    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    $sql = "UPDATE tp2_forum SET title = '$title', article = '$article', date = '$date' WHERE id = '$id'";

    mysqli_query($connex, $sql);
    mysqli_close($connex);
}

function forum_model_delete(){

    require(CONNEX_DIR);
    $id = $_GET['id'];
    $sql = "DELETE FROM tp2_forum WHERE id = '$id'";
    mysqli_query($connex, $sql);

}
?>
