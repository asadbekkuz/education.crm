<?php

namespace core\db;
use PDO;
class Connection
{

    private string $dsn;
    private string $username;

    private string $password;

    private static \PDO $con;
    public function __construct($config)
    {
        $this->dsn = $config['dsn'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        self::$con = new PDO("{$this->dsn}",$this->username,$this->password);
        self::$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public static function getConnection(): PDO
    {
        return self::$con;
    }
}