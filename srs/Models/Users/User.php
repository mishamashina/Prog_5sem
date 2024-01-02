<?php
    namespace srs\Models\Users;
    use srs\Models\ActiveRecordEntity;
    class User extends ActiveRecordEntity
    {
        protected $nickname;
        protected $email;
        protected $isConfirmed;
        protected $role;
        protected $passwordHash;
        protected $authToken;
        protected $createdAt;
        public function getNickname(): string
        {
            return $this->nickname;
        }
        protected static function getTableName(): string
        {
            return 'users';
        }
    }
?>