<?php
    namespace srs\Models\Articles;
    use MyProject\Models\Users\User;
    class Article
    {
        private $id;
        private $name;
        private $text;
        private $authorId;
        private $createdAt;

        //Так вот в методе __set() я получаю нужное мне имя для свойства объекта из имени, переданного в аргументе $name, 
        //а затем задаю в свойство с получившимся именем переданное значение.
        public function __set($name, $value)
        {
            $camelCaseName = $this->underscoreToCamelCase($name);
            $this->$camelCaseName = $value;
        }

        public function getId(): int
        {
            return $this->id;
        }
    
        public function getName(): string
        {
            return $this->name;
        }
    
        public function getText(): string
        {
            return $this->text;
        }
        private function underscoreToCamelCase(string $source): string
        {
            return lcfirst(str_replace('_', '', ucwords($source, '_')));
        }
        //Таким образом, если мы передадим в этот метод строку «created_at», он вернёт нам строку «createdAt», 
        //если передадим «author_id», то он вернёт «authorId». Именно то, что нам нужно!
    }
    
?>