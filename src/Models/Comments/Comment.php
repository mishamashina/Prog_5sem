<?php
    namespace src\Models\Comments;

    use src\Models\Users\User;
    use Services\Db;
    use src\Models\ActiveRecordEntity;

    class Comment extends ActiveRecordEntity{
        protected $authorId;
        protected $articleId;
        protected $text;
        public function getText()
        {
            return $this->text;
        }
        public function getAuthorId()
        {
            return $this->authorId;
        }
        public function getArticleId()
        {
            return $this->articleId;
        }
        public function setArticleId(string $articleId){
            $this->articleId = $articleId;
        }
        public function setText(string $text){
            $this->text = $text;
        }
        public function setAuthorId(int $authorId){
            $this->authorId = $authorId;
        }
        public static function getTableName(){
            return 'comments';
        }   
     }

