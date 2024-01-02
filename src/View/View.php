<?php

namespace src\View;

class View{
    private $templatesPath;

    public function __construct(string $templatesPath){
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, $vars = []){
        extract($vars);
        include $this->templatesPath.$templateName;
    }
}