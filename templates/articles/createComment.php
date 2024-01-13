<?php

require __DIR__ . '/../header.php';
?>

<form action="/prog/www/comment/store" method="POST">

    <div class="mb-3">
        <input type="hidden" name="postId" value="<?=$postId;?>">
        <label for="exampleInputName" class="form-label">Comment text</label>
        <input type="text" class="form-control" id="exampleInputName" name="text">
    </div>
    <div class="mb-3">
        <label for="select" class="form-label">Author article</label>
        <select name="author" id="select" class="form-control ">
            <?php foreach($users as $user):?>
                <option value="<?=$user->getId();?>"><?=$user->getNickname();?></option>
                <?php endforeach;?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Update</button>
</form>

<?php
require __DIR__ . '/../footer.html';
?>