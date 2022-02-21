<?php

class Repository
{
    protected $table;
    protected $schema;
    protected $query;

    public function setQuery(Query $Query)
    {
        $this->Query = $Query;
    }

    public function findById(int $id)
    {
        $this->Query->select([], $this->table, $id);

        return $this;
    }

    public function get()
    {
        $this->schema->map($this);
        return $this;
    }

    public function all()
    {
        $this->Query->all();
    }
}
