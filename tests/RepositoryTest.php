<?php
require_once __DIR__ . '/../vendor/autoload.php';

class RepositoryTest extends \PHPUnit\Framework\TestCase
{
    public function testRepository()
    {
        $Car = Car::init('json')
            ->findById(1)
            ->get();

        $this->assertSame($Car->color, 'red');
    }
}