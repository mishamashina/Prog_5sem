<?php
    namespace Services;
    class Db
    {
        private $pdo;
        public function __construct()
        {
            $dbOptions = (require __DIR__.'/../srs/settings.php');
            //"C:\xampp\htdocs\prog\srs\settings.php"
            $this->pdo = new \PDO(
                'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            // public __construct(
            //     string $dsn,
            //     ?string $username = null,
            //     ?string $password = null,
            //     ?array $options = null
            // ) Конструктор PDO
            $this->pdo->exec('SET NAMES UTF8');
            //Метод PDO::exec() запускает SQL-запрос на выполнение и возвращает количество строк, задействованных в ходе его выполнения.
        }

        //Свойство $this->pdo теперь можно использовать для работы с базой данных через PDO. Давайте напишем отдельный метод для выполнения запросов в базу.
        public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
        {
            $sth = $this->pdo->prepare($sql);
            $result = $sth->execute($params);
            if (false === $result) {return null;}
            return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
        }
    }
?>