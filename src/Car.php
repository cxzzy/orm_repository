<?php

class Car extends CarRepository
{
    public $color;
    public $brand;

    function __construct()
    {
        $this->table = 'car';
        $this->schema = new CarSchema();
    }
}
