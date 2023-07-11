<?php
    $name = NULL;
    if(isset($_SESSION['fingerPrint']))
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/style/style.css">
    <title>MVC</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="?module=forum&action=index">My articles</a></li>
            <?php
            if(isset($_SESSION['fingerPrint'])) echo '<li><a href="?module=user&action=logout">Logout</a></li>';
            else echo '<li><a href="?module=user&action=login">Login</a></li>'; 
            ?>
        </ul>
    </nav>
    <main>
        
    <?php echo $content;
    $localtime = localtime();
    $localtime_assoc = localtime(time(), true);
    print_r($localtime);
    print_r($localtime_assoc);
    
    /* echo localtime("y-m-d-H-i-s"); */?>

    </main>


<body>
</html>
