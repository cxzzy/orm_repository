<?php
class Car {
    public $color;

    public static function init() {
        return new Car();
    }

    public function findById() 
    {
        return new Car();
    }

    public function get() 
    {
        $Car = new Car();
        $Car->color = 'red';
        
        return $Car;
    }
}