<?php
    $name = NULL;
    $msg = NULL;
    if(isset($_SESSION['fingerPrint'])) $name = $_SESSION['name'];
    if(isset($_GET['msg'])){
        if($_GET['msg'] == 1){
        $msg = 'could not find the requested module';
        }
        if($_GET['msg'] == 2){
            $msg = 'could not find the requested action';
        }
        if($_GET['msg'] == 10){
            $msg = 'page not accessible';
        }
    }
?>
<div class="error"><strong><?= $msg?></strong></div>
<header>
    <h1>Welcome to the forum <strong><?=$name?></strong></h1>
</header>

<section>
    <h2>All articles</h2>
    <div class="article-grid">

    <?php foreach($data as $row){?>
        <article class="article">
            <h3><a href="#"><?= $row['title']?></a></h3>
            <p><?= $row['article']?></p>
            <cite>@<?= $row['name']?></cite><small><?= $row['date']?></small>
        </article>
    <?php } ?> 
    
    </div>
</section>