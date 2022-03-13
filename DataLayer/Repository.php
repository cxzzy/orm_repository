<?php

class Repository
{
    protected $schema;
    protected $Query;

    public function setQuery(Query $Query)
    {
        $this->Query = $Query;
        $this->Query->table = $this->schema->table;
    }

    public function findById(int $id): Repository
    {
        $this->Query->select([], $this->schema->table);
        $this->Query->where(['id' => $id]);

        return $this;
    }

    public function select(): Repository
    {
        $this->Query->select([], $this->schema->table);

        return $this;
    }

    public function delete(): Repository
    {
        $this->Query->delete($this->schema->table);

        return $this;
    }

    public function where(array $fields): Repository
    {
        $this->Query->where($fields);
        return $this;
    }

    public function limit(array $limit): Repository
    {
        $this->Query->limit($limit);
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
