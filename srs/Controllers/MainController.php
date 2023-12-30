<?php
    namespace srs\Controllers;
    use srs\View\View;
    use Services\Db;
    use srs\Models\Articles\Article;
    class MainController
    {
        private $view;
        private $db;
        public function __construct()
        {
            $this->view = new View(__DIR__ .'/../../templates'); //Путь до папки с шаблонами
            $this->db = new Db();
        }
        public function main()
        {
            $articles = $this->db->query('SELECT * FROM `articles`;', [], Article::class);//Запрос
            //var_dump($articles);
            $this->view->renderHtml('main/main.php', ['articles' => $articles]);
        }
        public function sayHello(string $name)
        {
            $this->view->renderHtml('main/hello.php', ['name' => $name]);
        }
    }
?>