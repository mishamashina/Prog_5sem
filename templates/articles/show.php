<?php
    require __DIR__.'/../header.php';
?>
<div class="card mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$article->getName()?></h5>
    <p class="card-text"><?=$article->getText();?></p>
    <p class="card-text"><?=$article->getAuthorId()->getNickname();?></p>
    <a href="/prog/www/article/edit/<?=$article->getId();?>" class="card-link">Update article</a>
    <a href="/prog/www/article/delete/<?=$article->getId();?>" class="card-link">Delete article</a>
  </div>
</div>
<h3>Comment</h3>

<a href="/prog/www/comment/create/<?=$article->getId();?>" class="card-link">Create comment</a>

<?php foreach($comments as $comment):?>
<div class="card mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$comment->getText()?></h5>
    <a href="/prog/www/comment/edit/<?=$comment->getId();?>" class="card-link">Edit comment</a>
    <a href="/prog/www/comment/delete/<?=$comment->getId();?>" class="card-link">Delete comment</a>
  </div>
</div>
<?php endforeach;?>
<?php
require __DIR__.'/../footer.html';
