<?php

class Query
{
    protected $sql;

    public function select(array $fields, string $table, int $id)
    {
        $this->sql .= sprintf(
            "SELECT %s FROM %s WHERE id = %s",
            implode(', ', $fields),
            $table,
            $id
        );
    }

    public function all()
    {
        $this->sql .= "SELECT * FROM";
    }

    public function final()
    {
        return $this->sql;
    }
}
