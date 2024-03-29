<?php

namespace src\Controllers;
use src\View\View;
use src\Models\Articles\Article;
use src\Models\Comments\Comment;
use src\Models\Users\User;

class ArticleController{
    private $view;

    public function __construct(){
        $this->view = new View(__DIR__.'/../../templates/');
    }

    public function index(){
        $articles = Article::findAll();
        $this->view->renderHtml('articles/view.php', ['articles'=>$articles]);
    }

    public function create(){
        $users = User::findAll();
        $this->view->renderHtml('articles/create.php', ['users'=>$users]);
    }
    public function store(){
        $article = new Article;
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['author']);
        $article ->save();
        return header('Location: http://localhost/prog/www');           
    }

    public function show ($id){
        $article = Article::getById($id);
        $comments = Comment::findAllComments($id);
        $this->view->renderHtml('articles/show.php', ['article'=>$article, 'comments'=>$comments]);
    }

    public function update(int $id){
        $article = Article::getById($id);
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->setAuthorId($_POST['author']);
        $article ->save();
        $this->show($id);
    }
    public function edit(int $id){
        //var_dump($id);
        $users = User::findAll();
        $article = Article::getById($id);
        $this->view->renderHtml('articles/edit.php', ['article'=>$article, 'users'=>$users]);
    }
    public function delete(int $id){
        $article = Article::getById($id);
        if(Comment::findAllComments($article->getId()) != null){
          $comments = Comment::findAllComments($article->getId());
          foreach($comments as $comment){
           $comment->delete();
          }
        }
        $article->delete();
        header('Location: http://localhost/prog/www/');
        }
}