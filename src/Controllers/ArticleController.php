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

    public function create(string $title){
        //echo 'Вошло';
        if ($title == '0')
        {
            //echo 'Создаем статью';
            $users = User::findAll();
            $this->view->renderHtml('articles/create.php', ['users'=>$users, 'title' => $title]);
        }
        else
        {       
            //echo 'Создаем комментарий'; 
            $users = User::findAll();
            //$comment = Comment::findAll();
            //var_dump($comment);
            //var_dump($users);
            $this->view->renderHtml('articles/create.php', ['users'=>$users, 'title' => $title]);
        }
    }
    public function store(string $title){
        //echo 'Вошло store';
        //var_dump($title);
        if ($title == 0)
        {
            $article = new Article;
            $article->setName($_POST['name']);
            $article->setText($_POST['text']);
            $article->setAuthorId($_POST['author']);
            $article ->save();
            return header('Location: http://localhost/prog/www');           
        }
        else
        {
            $comment = new Comment;
            $comment->setArticleId($_POST['articleId']);
            $comment->setText($_POST['text']);
            $comment->setAuthorId($_POST['author']);
            $comment->save();
            return header('Location: http://localhost/prog/www');
        }
    }

    public function show ($id){
        $article = Article::getById($id);
        //var_dump($article);
        $comments = Comment::where($article->getId(), 'article_id');
        //var_dump($comments);
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
    public function update_comment(int $id){
        //echo 'Зашло';
        //var_dump($id);
        $comment = Comment::getById($id);
        $comment->setArticleId($_POST['article']);
        $comment->setText($_POST['text']);
        $comment->setAuthorId($_POST['author']);
        //var_dump($comment);
        $comment->save();
        return header('Location: http://localhost/prog/www');
        $this->show($id);
    }

    public function edit(int $id){
        //var_dump($id);
        $users = User::findAll();
        $article = Article::getById($id);
        $this->view->renderHtml('articles/edit.php', ['article'=>$article, 'users'=>$users]);
    }
    public function edit_comment(int $id){
        //var_dump($id);
        $comments = Comment::where($id, 'id');
        //var_dump($comments);
        $users = User::findAll();
        $this->view->renderHtml('articles/edit_comment.php', ['users'=>$users, 'comments'=>$comments]);
    }
}