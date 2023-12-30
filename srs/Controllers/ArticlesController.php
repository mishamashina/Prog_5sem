<?php
    namespace srs\Controllers;
    use srs\View\View;
    use Services\Db;
    use srs\Models\Articles\Article;
    class ArticlesController
    {
        private $view;
        private $db;
        public function __construct()
        {
            $this->view = new View(__DIR__ .'/../../templates');
            $this->db = new Db();
        }
        public function view(int $articleId)
        {
            $result = $this->db->query(
                'SELECT * FROM `articles` WHERE id = :id;',
                [':id' => $articleId], Article::class
            );
            //var_dump($result);
            //var_dump($articleId);
            if ($result === []) 
            {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }

            $this->view->renderHtml('articles/view.php', ['article' => $result[0]]);
        }
    }
?>