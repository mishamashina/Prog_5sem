<?php
    namespace srs\Models\Articles;
    use srs\Models\Users\User;
    use srs\Models\ActiveRecordEntity;
    class Article extends ActiveRecordEntity
    {
        protected $name;
        protected $text;
        protected $authorId;
        protected $createdAt;
        public function getName(): string
        {
            return $this->name;
        }
        public function getText(): string
        {
            return $this->text;
        }
        public function setName(string $name)
        {
            $this->name = $name;
        }
        public function setText(string $text)
        {
            $this->text = $text;
        }
        public function setAuthor(User $author): void
        {
            $this->authorId = $author->getId();
        }
        protected static function getTableName(): string
        {
            return 'articles';
        }
        public function getAuthor(): User
        {
            return User::getById($this->authorId);
        }
            //Таким образом, если мы передадим в этот метод строку «created_at», он вернёт нам строку «createdAt», 
            //если передадим «author_id», то он вернёт «authorId». Именно то, что нам нужно!
    }
    
?>