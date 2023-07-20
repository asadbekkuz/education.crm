<?php

namespace models;

use core\model\Model;
use PDO;

class User extends Model
{
    public string $username = '';
    public string $password = '';
    public string $confirm  = '';
    public string $email    = '';

    public function tableName(): string
    {
        return 'users';
    }

    public function attributes(): array
    {
        return [
            'username','password','confirm','email'
        ];
    }

    public function primaryKeyName(): string
    {
        return 'id';
    }


    public static function find(): User
    {
        return new self();
    }

    public function checkUser($username, $password)
    {
        $sql = "select * from users where username = :username and password = :password";
        /** @var PDO $con */
        $stmt = $this->con->prepare($sql);
        $stmt->bindValue(':username',$username);
        $stmt->bindValue(':password',$password);
        $stmt->execute();
        return $stmt;
    }

}
