<?php

class Car extends CarRepository
{
    public $color;
    public $brand;

    function __construct()
    {
        $this->schema = new CarSchema();
    }
}
