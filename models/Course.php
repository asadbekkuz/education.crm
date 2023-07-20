<?php

namespace models;


use components\Component;
use core\model\Model;
use PDO;

class Course extends Model
{
    public string $course_name = '';
    public string $description = '';
    public string $duration = '';
    public string $start_date = '';
    public string $end_date = '';
    public int $teacher_id;
    public int $fee;

    public static function find()
    {
        return new self();
    }

    public function primaryKeyName(): string
    {
        return 'course_id';
    }


    public function attributes(): array
    {
        return [
            'course_name','description','duration','start_date','end_date','teacher_id','fee'
        ];
    }

    public function tableName(): string
    {
        return "courses";
    }

    public function getCourses(mixed $order, int $offset)
    {
        $sql = "select * from courses c inner join teachers t on t.teacher_id = c.teacher_id order by ".$order." limit ".$offset.", ".Component::LIMIT;
        /** @var PDO $con */
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function sortBySql(int $offset, mixed $column, mixed $order)
    {
        $orderBy = 'c.'.$column.' '.$order;
        $sql = "select * from courses c inner join teachers t on t.teacher_id = c.teacher_id order by ".$orderBy." limit ".$offset.", ".Component::LIMIT;
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}