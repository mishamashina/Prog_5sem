<?php
    namespace src\Models\Comments;

    use src\Models\Users\User;
    use Services\Db;
    use src\Models\ActiveRecordEntity;


    class Comment extends ActiveRecordEntity{
       
        protected $name;
        protected $articleId;

       
        public function getName()
        {
            return $this->name;
        }
        
        public function getArticleId()
        {
            return $this->articleId;
        }

        public static function getTableName(){
            return 'comments';
        }
     }

