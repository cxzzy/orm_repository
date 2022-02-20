<?php

class CarSchema
{
    public static function getData(): array
    {
        return [
            'color' => "red",
            'brand' => "Tesla",
            'engineType' => 'electric'
        ];
    }

    public function map(Repository $Model)
    {
        foreach ($this->getData() as $field => $value) {
            $Model->$field = $value;
            $array[$field] = $value;
        }
    }
}
