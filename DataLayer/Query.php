<?php

class Query
{
    protected $sql;

    function __construct()
    {
        $host = 'localhost';
        $db = 'cars';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function select(array $fields, string $table)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);

        $this->sql .= sprintf(
            "SELECT %s FROM %s",
            $fields,
            $table
        );
    }

    public function all()
    {
        $this->sql .= "SELECT * FROM";
    }

    public function where(int $id)
    {
        $this->sql .= sprintf(" WHERE id = %s", $id);
    }

    public function run(): array
    {
        $results = [];

        if ($this->sql != '') {
            $statement = $this->pdo->prepare($this->sql);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    public function final()
    {
        return $this->sql;
    }
}
