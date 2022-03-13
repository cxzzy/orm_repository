<?php

class Query implements IQuery
{
    public $table;
    private $pdo;
    protected $sql;
    protected $sqlArray = [];

    function __construct()
    {
        try {
            $this->pdo = new DataBase();
        } catch (\PDOException $e) {
            $this->pdo = null;
        }
    }

    public function select(array $fields)
    {
        $fields = empty($fields) ? '*' : implode(', ', $fields);
        $this->sqlArray[] = sprintf("SELECT %s FROM %s", $fields, $this->table);
    }

    public function delete()
    {
        $this->sqlArray[] = sprintf("DELETE FROM %s", $this->table);
    }

    public function all()
    {
        $this->sqlArray[] = "SELECT * FROM";
    }

    public function where(array $where)
    {
        $column = key($where);
        $value = reset($where);

        $sql = "WHERE $column = $value";
        $this->sqlArray[] = $sql;

        if (count($where) > 1) {
            foreach ($where as $column => $value) {
                $sql = "AND $column = $value";
                $this->sqlArray[] = $sql;
            }
        }
    }

    public function orderBy(array $order)
    {
        // TODO: Implement orderBy() method.
    }

    public function limit(array $limit)
    {
        if (count($limit) > 1) {
            $limit = array_reverse($limit);
        }

        $limitString = implode(',', $limit);

        $this->sqlArray[] = "LIMIT $limitString";
    }

    public function run(): array
    {
        $results = [];

        if ($this->pdo != null && $this->sql != '') {
            $statement = $this->pdo->prepare($this->sql);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        return $results;
    }

    public function final()
    {
        print_r($this->sqlArray);
        return implode(' ', $this->sqlArray);
    }
}
