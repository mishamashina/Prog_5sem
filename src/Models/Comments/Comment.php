<?php
    namespace src\Models\Comments;
    use src\Models\Users\User;
    use Services\Db;
    use src\Models\ActiveRecordEntity;
    class Comment extends ActiveRecordEntity{
        protected $postId;
        protected $id;
        protected $text;
        protected $authorId;

        public function getPostId(){
            return $this->postId;
        }

        public function getId(){
            return $this->id;
        }

        public function getText(){
            return $this->text;
        }

        public function getUserById() : User{
           $db = Db::getInstance(); 
           $user = $db -> query('SELECT * FROM `users` WHERE `id` = :id', [':id'=>$this->authorId], User::class);
           return $user[0];
        }

        public function setPostId(int $postId){
            $this->postId = $postId;
        }

        public function setId(int $id){
           $this->id = $id;
        }

        public function setText(string $text){
             $this->text = $text;
        }

        public function setAuthorId(int $authorId){
            $this->authorId = $authorId;
        }
       
        public static function getTableName()
        {
            return 'comments';
        }   
    }

