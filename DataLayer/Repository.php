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
        $this->Query->select([], $this->table);
        $this->Query->where($id);

        return $this;
    }

    public function select()
    {
        $this->Query->select([], $this->table);

        return $this;
    }

    public function where()
    {
        return $this;
    }

    public function all()
    {
        $this->Query->all();
    }

    public function get()
    {
        $result = $this->Query->run();

        if (count($result) > 1) {
            return $result;
        }

        $this->schema->map($this, $result);

        return $this;
    }
}
