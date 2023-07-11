<?php

function user_model_auth($request){

    require(CONNEX_DIR);
    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }

    $sql = "SELECT * FROM tp2_user WHERE  username = '$username'";
    $result = mysqli_query($connex, $sql);
    $rowcount = mysqli_num_rows($result);

    if ($rowcount == 1) {

        $salt = '4das#Vsd90gfF';
        $user = mysqli_fetch_assoc($result);
        $dbPassword = $user['password'];

        if(password_verify($password.$salt, $dbPassword)){
            session_regenerate_id();
            $_SESSION['userId'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER[
            'REMOTE_ADDR']);
            header("Location: ?module=base&action=index");

        } else {
            header("Location: ?module=user&action=login&msg=2");
        }
    } else {
        header("Location: ?module=user&action=login&msg=1");
    }
}

function user_model_store($request){
    require(CONNEX_DIR);

    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    }
    
    $salt = '4das#Vsd90gfF';
    $password = password_hash($password.$salt, PASSWORD_BCRYPT);

    $sql = "INSERT INTO tp2_user(name, username, password, dob) VALUES ('$name', '$username', '$password', '$dob')";
    
    mysqli_query($connex, $sql);
    mysqli_close($connex);

}



?>