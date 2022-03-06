<?php

class CarSchema
{
    public static function getData(): array
    {
        return [
            'color' => ['column' => 'color'],
            'brand' => ['column' => 'brand']
        ];
    }

    public function map(Repository $Model, array $data)
    {
        foreach ($this->getData() as $field => $schema) {
            $column = $schema['column'] ?? '';
            $Model->$field = $data[$column] ?? '';
            $array[$field] = $schema;
        }
    }
}
