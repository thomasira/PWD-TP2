<?php
require(SECURE_DIR);
$msg = NULL;
if(isset($_GET['msg'])){
    if($_GET['msg'] == 1){
        $msg = 'make sure you have title(2 to 25 char) and an article(max 1000 char)';
    }
}
$title = $article = '';
if (isset($data)) {
    foreach($data as $key => $value){
        $$key = $value;
    }
}

?>
<form action="?module=forum&action=update" method="post">
    <div class="error"><p><?=$msg?></p></div>
    <h2>Edit</h2>
    <label>Title:  
        <input type="text" name="title" value="<?= $title?>">
    </label>
    <label>Article: 
        <textarea type="text" name="article"  rows="4" cols="50"><?= $article?></textarea>
    </label>
    <input type="text" value="<?= $id?>" name="id" class="invisible">
    <input type="text" value="<?= date("Y-m-d")?>" name="date" class="invisible">
    <input type="submit" value="edit" class="button">
</form>

