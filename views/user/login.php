<?php
$msg = NULL;
if(isset($_GET['msg'])){
    if($_GET['msg'] == 1){
        $msg = 'username does not exist.';
    }
    if($_GET['msg']==2){
        $msg = 'password not ok';
    }
    if($_GET['msg']==3){
        $msg = 'please login to see your articles';
    }
    if($_GET['msg']==10){
        $msg = 'you need to login in order to view the requested page.';
    }
}

/* 
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $nameError = $usernameError = $dobError = $passwordError = NULL;
    $name = $username = $dob = $password = NULL;

    $error = false;  

    foreach($request as $key => $value){
        $$key = mysqli_real_escape_string($connex, $value);
    
        if($key == 'name'){
            if(strlen($value)>2 && strlen($value)<=25){
                if(!preg_match("/^[a-zA-Z\s]*$/", $value)){
                    $msg = "Le nom ne peut contenir de caractère spéciaux";
                    $error = true;
                }

            } else {
                $msg = "Le nom est obligatoire et doit avoir entre 2 et 25 caractères.";
                $error = true;
            }
        }
        elseif($key == 'username'){
            if(strlen($value) == 0) {
                $usernameError = "Ce champs est requis";
                $error = true;
            
            } else {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $usernameError = "username non valide. format email requis";
                    $error = true;
                }
            }
        }
        elseif($key == 'dob'){
            $errorBirth = validateDate($dob);
            if($errorBirth == true && strlen($value) != 0){
                $error = true;
                $dobError = "Le date n'est pas valide.";
            }
        }
        elseif($key == 'password'){
            if(strlen($value)>6 && strlen($value)<=20){
                if(!preg_match("/^(?:[0-9]+[a-z]|[a-z]+[0-9])[a-z0-9]*$/", $value)){
                    $passwordError = "Le mot de passe doit contenir des au moins un chiffre et une lettre";
                    $error = true;
                }   
            } else {
                $passwordError = "Le mot est obligatoire et doit être entre 6 et 20 caractères.";
                $error = true;
            }
        }
    }  
    if (!$error) header("Location: ?module=user&action=create"); 
}*/
?>
<div class="error"><p><?=$msg?></p></div>
<div class="forms">
    
    <form action="?module=user&action=auth" method="post">

    <h2>Login</h2>
        <label>Username(email):
            <input type="text" name="username">
        </label>
        <label>Password:
            <input type="password" name="password">
        </label>
        <input type="submit" value="login" class="button">
    </form>

    <form action="?module=user&action=create" method="post">

    <h3>Create account</h3>
        <label>Name:
            <input type="text" name="name">
        </label>
        <label>Username(email):
            <input type="text" name="username">
        </label>
        <label>Date of Birth:
            <input type="text" name="dob" placeholder="yyyy-mm-dd">
        </label>
        <label>Password:
            <input type="password" name="password">
        </label>
        <input type="submit" value="create" class="button">
    </form>
</div>