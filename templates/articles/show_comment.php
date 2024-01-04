<?php
    require __DIR__.'/../header.php';
?>
<?php foreach($comments as $comment):?>
    <div class="card mt-3" style="width: 18rem;">
    <div class="card-body">
    <p class="card-text"><?=$comment->getText();?></p>
    <a href="/prog/www/article/<?=$comment->getArticleId();?>/comments/<?=$comment->getId();?>/edit" class="card-link">Update</a>
    <a href="/prog/www/article/<?=$comment->getArticleId();?>/comments/<?=$comment->getId();?>/delete" class="card-link">Delete</a>
  </div>
<?php endforeach;?>
<?php
require __DIR__.'/../footer.html';