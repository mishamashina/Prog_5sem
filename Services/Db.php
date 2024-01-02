<?php
    namespace Services;
    class Db
    {
        private $pdo;
        private static $instance;
        public static $instancesCount = 0;
        private function __construct()
        {
            self::$instancesCount++;
            //var_dump(self::$instancesCount);
            $dbOptions = (require __DIR__.'/../srs/settings.php');
            //"C:\xampp\htdocs\prog\srs\settings.php"
            $this->pdo = new \PDO(
                'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
                $dbOptions['user'],
                $dbOptions['password']
            );
            $this->pdo->exec('SET NAMES UTF8');
            //Метод PDO::exec() запускает SQL-запрос на выполнение и возвращает количество строк, задействованных в ходе его выполнения.
        }
        public static function getInstance(): self
        {
            if (self::$instance === null) {
                self::$instance = new self();
            }
            return self::$instance;
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