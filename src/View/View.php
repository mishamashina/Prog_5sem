<?php

namespace src\View;

class View{
    private $templatesPath;

    public function __construct(string $templatesPath){
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, $vars = []){
        extract($vars);
        //var_dump($vars);
        include $this->templatesPath.$templateName;
    }
}