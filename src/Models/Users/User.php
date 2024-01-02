<?php
    namespace src\Models\Users;
    use src\Models\ActiveRecordEntity;

    class User extends ActiveRecordEntity{
        protected $nickname;
        protected $email;
        protected $isConfirmed;
        protected $passwordHash;
        protected $role;
        protected $authToken;
        protected $createdAt;

      
        public function getNickname(){
            return $this->nickname;
        }
        public static function getTableName(){
            return 'users';
        }
     }

