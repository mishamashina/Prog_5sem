<?php
    namespace srs\View;
    class View
    {
        private $templatesPath;
        public function __construct(string $templatesPath) //Путь до папки с шаблонами
        {
            $this->templatesPath = $templatesPath;
        }
        public function renderHtml(string $templateName, array $vars = [], int $code = 200) //метод, в который передавают имя конкретного шаблона и массив с переменными
        {
            http_response_code($code);
            extract($vars); // Ключ = value

            //var_dump($vars);
            ob_start();
            include $this->templatesPath .'/'.$templateName;
            $buffer = ob_get_contents();
            ob_end_clean();
            //var_dump($code);
            echo $buffer;
        }
    }
?>