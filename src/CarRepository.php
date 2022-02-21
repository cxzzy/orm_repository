<?php

class CarRepository extends Repository
{
    public static function init($Query)
    {
        $Car = new Car();
        $Car->setQuery($Query);

        return $Car;
    }
}
