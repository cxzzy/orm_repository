<?php

class Mapper
{
    public function map(Repository $Model, array $data)
    {
        foreach ($this->getData() as $field => $schema) {
            $column = $schema['column'] ?? '';
            $Model->$field = $data[$column] ?? '';
            $array[$field] = $schema;
        }
    }
}
