<?php
    require __DIR__.'/../header.php';
?>
<?php foreach($comments as $comment):?>
<form action="/prog/www/article/update_comment/<?=$comment->getId();?>" method="POST">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Article Id</label>
    <input type="text" class="form-control" id="exampleInputName" name="article" value="<?=$comment->getArticleId();?>"=>
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Text comment</label>
    <input type="text" class="form-control" id="exampleInputText" name="text" value="<?=$comment->getText();?>">
  </div>
  <div class="mb-3">
    <label for="select" class="form-label">Author comment</label>
    <select name="author" id="select" class="form-control">
        <?php foreach($users as $user):?>
            <option value="<?=$user->getId();?>"><?=$user->getNickname();?></option>
        <?php endforeach;?>
    </select>
  <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>
<?php endforeach;?>
<?php
require __DIR__.'/../footer.html';