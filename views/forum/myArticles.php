<?php
/* if(!isset($_SESSION['fingerPrint']) OR
$_SESSION['fingerPrint']!=md5($_SERVER['HTTP_USER_AGENT'] .
$_SERVER['REMOTE_ADDR'])) {
    header("Location: ?module=user&action=login&msg=3");
} */
require(SECURE_DIR);
?> 

<section>
    <h2>My articles</h2>
    <a href="?module=forum&action=create" class="button">Add article</a>

    <div class="article-grid">

    <?php foreach($data as $row){ ?>
        <article class="article">
            <h3><?= $row['title']?></h3>
            <p><?= $row['article']?></p>
            <small><?= $row['date']?></small>
            <div>
                <a href="?module=forum&action=delete&id=<?= $row['id']?>" class="button">delete</a>
                <a href="?module=forum&action=edit&id=<?= $row['id']?>" class="button">edit</a>
            </div>
        </article>
    <?php } ?> 

    </div>
</section>