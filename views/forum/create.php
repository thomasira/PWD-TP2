<?php

$msg = NULL;
if(isset($_GET['msg'])){
    if($_GET['msg'] == 1){
        $msg = 'make sure you have title(5 to 100 char) and an article(max 1000 char)';
    }
}
?>
<form action="?module=forum&action=store" method="post">
    <div class="error"><p><?=$msg?></p></div>
    <h2>New article</h2>
    <label>Title:  
        <input type="text" name="title">
    </label>
    <label>Article: 
        <textarea type="text" name="article"  rows="4" cols="50"></textarea>
    </label>
    <input type="submit" value="create" class="button">
    <input type="text" value='<?= date("Y-m-d") ?>' name="date" class="invisible">
</form>
