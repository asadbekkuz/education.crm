<?php

namespace models;

use PDO;
use core\model\Model;

class Teacher extends Model
{
    public string $name = '';
    public string $specialization = '';

    public string $phone = '';

    public string $email = '';

    public function tableName(): string
    {
        return 'teachers';
    }

    public function primaryKeyName(): string
    {
        return "teacher_id";
    }
    public function attributes(): array
    {
        return ['name','specialization','phone','email'];
    }


    public static function find()
    {
        return new self();
    }

}