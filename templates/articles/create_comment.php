<?php
    require __DIR__.'/../header.php';
?>

<form action="/prog/www/article/store_comment" method="POST">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Article Id</label>
    <input type="text" class="form-control" id="exampleInputName" name="article">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Text comment</label>
    <input type="text" class="form-control" id="exampleInputText" name="text">
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

<?php
require __DIR__.'/../footer.html';