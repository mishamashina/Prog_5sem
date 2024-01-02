<?php
    require __DIR__.'/../header.php';
?>

<form action="/prog/www/article/update/<?=$article->getId();?>" method="POST">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name article</label>
    <input type="text" class="form-control" id="exampleInputName" name="name" value="<?=$article->getName();?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label">Text article</label>
    <input type="text" class="form-control" id="exampleInputText" name="text" value="<?=$article->getText();?>">
  </div>
  <div class="mb-3">
    <label for="select" class="form-label">Author article</label>
    <select name="author" id="select" class="form-control">
      <option value="<?=$article->getAuthorId()->getId();?>"><?=$article->getAuthorId()->getNickName();?></option>
        <?php foreach($users as $user):?>
            <option value="<?=$user->getId();?>"><?=$user->getNickname();?></option>
        <?php endforeach;?>
    </select>
  <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>

<?php
require __DIR__.'/../footer.html';