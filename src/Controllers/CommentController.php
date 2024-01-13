<?php
namespace src\Controllers;

use src\View\View;
use src\Models\Articles\Article;
use src\Models\Users\User;
use src\Models\Comments\Comment;
class CommentController{
    private $view;
    public function __construct(){ 
        $this->view = new View(dirname(dirname(__DIR__)).'/templates');
    }
    public function index(int $postId){ 
        $comments = Comment::findAllComments($postId);
        $this->view->renderHTML('/articles/view.php', ['comments'=>$comments]);
    }
    public function create(int $postId){ 
      $users = User::findAll(); 
      $this->view->renderHtml('/articles/createComment.php', ['users'=>$users, 'postId'=> $postId]);
    }
    public function store(){ 
        echo 'Вошло';
        $comment = new Comment;
        $comment->setPostId($_POST['postId']);
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['author']);
        var_dump($_POST['postId']);
        $comment->save();
        header('Location: http://localhost/prog/www/article/'.$comment->getPostId());
     }
     public function delete(int $id){
     $comment = Comment::getById($id);
     $comment->delete();
     header('Location: http://localhost/prog/www/article/'.$comment->getPostId());
     }
    public function update($id){
      $comment = Comment::getById($id);
      $comment->setText($_POST['text']);
      $comment-> save();
      header('Location: http://localhost/prog/www/article/'.$comment->getPostId());
     }
     public function edit($id){
       $users = User::findAll();
       $comment = Comment::getById($id);
       $this->view->renderHtml('/articles/editComment.php', ['comment'=>$comment, 'users'=>$users]);
     }
}