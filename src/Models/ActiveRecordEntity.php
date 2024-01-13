<?php

namespace src\Models;
use Services\Db;

abstract class ActiveRecordEntity { //работа с бд
    protected $id; //хранение идентификатора сущности

    public function __set(string $property, string $value){ //магический метод (вызывается когда присваивается значение объекту, доступа к которому нет или его не сущ)
        $propertyName = $this->underscoreToCamelCase($property);
        $this->$propertyName = $value;
    }

    public function underscoreToCamelCase(string $name){ //преобразование из подчеркивания в CamelCase
        return lcfirst(str_replace('_', '', ucwords($name, '_')));
    }

    public function getId() //вернет значение свойства id
    {
        return $this->id;
    }

    public static function findAll() //получение всех записей из бд
    {   
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'`';
        $articles = $db->query($sql, [], static::class);
        return $articles;
    }

    public static function getById(int $id): ?self //вернет объект по его id
    {
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `id`=:id';
        $entities = $db->query($sql, [':id' => $id], static::class);
        return $entities ? $entities[0] : null;
    }

    private function mapToDbProperties():array //формирует массив свойств для сохранения в бд
    {
        $mapped = [];
        $reflector = new \ReflectionObject($this);
        $properties = $reflector->getProperties();
        $propertiesName = [];
        foreach($properties as $property){
            $propertyName = $property->getName();
            $propertiesNameToDbFormat= $this->camelcaseToUnderScore($property->getName());
            $propertiesName[$propertiesNameToDbFormat] = $this->$propertyName;
        }
        return $propertiesName;
    }
    private function camelcaseToUnderScore(string $name){
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $name));
    }
    public function save(){
        $propertiesName = $this-> mapToDbProperties();
         if($propertiesName['id'] === null){ $this->insert($propertiesName);}
         else  $this->update($propertiesName);
     }

    public function insert($propertiesName){
        $db = Db::getInstance();
        $name = [];
        $param = [];
        $paramToValue = [];
        foreach($propertiesName as $key=>$value){
            $param = ':'.$key;
            $name []= '`'.$key.'`';
            $params [] = $param;
            $paramToValue[$param] = $value;
    }
    $sql = 'INSERT INTO '.static::getTableName().' ('.implode(',', $name).') 
    VALUES ('.implode(',', $params).')';
    $db->query($sql, $paramToValue, static::class);
    }
    public function update($propertiesName){
        $db = Db::getInstance();
        $keyToParam = [];
        $paramToValue = [];
        foreach($propertiesName as $key=>$value){
            $param = ':'.$key;
            $keyToParam[] = '`'.$key.'`='.$param;
            $paramToValue[$param] = $value;
        }
        $sql = 'UPDATE '.static::getTableName().' SET '.implode(',', $keyToParam).' WHERE `id`='.$this->id;
        $db->query($sql, $paramToValue, static::class);
    }
    public function delete(){
        $db = Db::getInstance();
        $sql = 'DELETE FROM `'.static::getTableName().'` WHERE `id`=:id';
        $db->query($sql, [':id'=>$this->id], static::class);
    }

    public static function findAllComments(int $postId){
        $db = Db::getInstance();
        $sql = 'SELECT * FROM `'.static::getTableName().'` WHERE `post_id`=:id';
        $comments = $db->query($sql, [':id' => $postId], static::class);
        return $comments;
    }

    abstract static function getTableName(); //эти методы должны быть реализованы в других подклассах
    
}