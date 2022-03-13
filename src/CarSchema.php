<?php

class CarSchema extends Mapper
{
    public $table = 'car';

    public function getData(): array
    {
        return [
            'color' => ['column' => 'color'],
            'brand' => ['column' => 'brand']
        ];
    }
}
