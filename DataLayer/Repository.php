<?php

class Repository extends Query
{
    protected $table;
    protected $schema;

    public function findById(int $id)
    {
        $this->select([], $this->table, $id);

        return $this;
    }

    public function get()
    {
        $this->schema->map($this);
        return $this;
    }
}
