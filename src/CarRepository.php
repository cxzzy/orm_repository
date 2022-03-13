<?php

class CarRepository extends Repository
{
    public static function init(Query $Query): Car
    {
        $Car = new Car();
        $Car->setQuery($Query);

        return $Car;
    }
}
