<?php

class CarRepository extends Repository
{
    public static function init()
    {
        return new Car();
    }
}
