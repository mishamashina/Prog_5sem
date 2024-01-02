<?php

require __DIR__.'/../header.php';
echo '
<table class="table">
<thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Name</th>
    <th scope="col">Text</th>
    <th scope="col">Author</th>
  </tr>
</thead>
<tbody>';
$i = 0;
foreach($articles as $article){
    echo '
    <tr>
      <th scope="row">'.++$i.'</th>
      <td><a href="article/'.$article->getId().'">'.$article->getName().'</a></td>
      <td>'.$article->getText().'</td>
      <td>'.$article->getAuthorId()->getNickname().'</td>
    </tr>';
}
echo '
    </tbody>
    </table>';
require __DIR__.'/../footer.html';