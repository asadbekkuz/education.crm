<?php

namespace core\model;

use PDO;
use components\Component;
use core\db\Connection;

abstract class Model
{
    protected PDO $con;
    public function __construct()
    {
        $this->con = Connection::getConnection();
    }

    abstract public function attributes(): array;
    abstract public function primaryKeyName(): string;

    abstract public function tableName(): string;

    public function getPageCount()
    {
        $sql = "select * from {$this->tableName()}";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return ceil(($stmt->rowCount())/Component::LIMIT);
    }

    function retrieveAllData($page,$sql)
    {
        $offset = ($page - 1) * Component::LIMIT;
        /** @var PDO $con */
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':offset',$offset,PDO::PARAM_INT);
        $stmt->bindValue(':limit', Component::LIMIT,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save(){
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr)=>":$attr",$attributes);
        $statement = $this->con->prepare("INSERT INTO $tableName (".implode(',',$attributes).") 
          VALUES (".implode(',',$params).")");

        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute",$this->{$attribute});
        }
        return $statement->execute();
    }

    public function updateById($id): bool
    {
        $tableName = $this->tableName();
        $primaryKeyName = $this->primaryKeyName();
        $attributes = $this->attributes();

        $params = array_map(fn($attr)=>"$attr=:$attr",$attributes);
        $statement = $this->con->prepare("UPDATE {$tableName} 
                    SET ".implode(',',$params)."  WHERE {$primaryKeyName} =:id");
        foreach ($attributes as $attribute)
        {
            $statement->bindValue(":$attribute",$this->{$attribute});
        }
        $statement->bindValue(":id",$id,PDO::PARAM_INT);
        return $statement->execute();
    }

    public function loadData(array $data)
    {
        foreach($data as $key => $value)
        {
            if(property_exists($this,$key))
            {
                $this->{$key} = $value;
            }
        }
    }

    public function getById($id)
    {
        $stmt = $this->con->prepare("select * from {$this->tableName()} where {$this->primaryKeyName()} =:id");
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getList()
    {
        $sql = "select * from {$this->tableName()} limit :offset, :limit";
        return $this->retrieveAllData('1',$sql);
    }

    public function delete($id): bool
    {
        $statement = $this->con->prepare("DELETE FROM {$this->tableName()} WHERE {$this->primaryKeyName()} = :id");
        $statement->bindValue(":id",$id,PDO::PARAM_INT);
        return $statement->execute();
    }

    function getListByPage($page = 1,$withoutLimit =  false)
    {
        $sql = "select * from {$this->tableName()}";
        if(!$withoutLimit){
            $sql = "select * from {$this->tableName()}  LIMIT :offset, :limit";
        }
        return $this->retrieveAllData($page,$sql);
    }

    public function all()
    {
        $statement = $this->con->prepare("SELECT * FROM {$this->tableName()}");
        if($statement->execute())
        {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return [];
    }

    public function getByFilter($column,$value)
    {
        $sql = "select * from {$this->tableName()} where :column like '%php%'";
//        $value = "'%$value%'";
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':column',$column);
//        $stmt->bindValue(":value",$value);
        $stmt->execute();
        echo "<pre>";
            print_r($stmt->fetchAll(PDO::FETCH_ASSOC));
        echo "</pre>";
        exit();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}