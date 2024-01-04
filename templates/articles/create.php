<?php
    require __DIR__.'/../header.php';
    //var_dump($title);
    if ($title == 0)
    {
      $name = 'Name article';
      $text = 'Text article';
      $author = 'Author article';
      //$arr = ['name', 'text', 'author'][$name, $text, $author];
      //$arr = [arr1['name', 'text', 'author'], arr2[$name, $text, $author]];
      $arr = array(array('name', 'text', 'author'), array($name, $text, $author));
      //var_dump($arr);
      //var_dump($arr[0][2]);
    }
    else
    {
      $articleId = 'Id article';
      $text = 'Text comment';
      $author = 'Author comment';
      $arr = array(array('articleId', 'text', 'author'), array($articleId, $text, $author));
    }
    //var_dump($arr[0][0]);
    //var_dump($name);
    //var_dump($text);
?>
<form action="/prog/www/article/store/<?=$title?>" method="POST">
  <div class="mb-3">
    <label for="exampleInputName" class="form-label"><?=$arr[1][0]?></label>
    <input type="text" class="form-control" id="exampleInputName" name=<?=$arr[0][0]?>>
  </div>
  <div class="mb-3">
    <label for="exampleInputText" class="form-label"><?=$arr[1][1]?></label>
    <input type="text" class="form-control" id="exampleInputText" name=<?=$arr[0][1]?>>
  </div>
  <div class="mb-3">
    <label for="select" class="form-label"><?=$arr[1][2]?></label>
    <select name=<?=$arr[0][2]?> id="select" class="form-control">
        <?php foreach($users as $user):?>
            <option value="<?=$user->getId();?>"><?=$user->getNickname();?></option>
        <?php endforeach;?>
    </select>
  <button type="submit" class="btn btn-primary mt-3">Save</button>
</form>

<?php
require __DIR__.'/../footer.html';