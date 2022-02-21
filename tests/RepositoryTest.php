<?php
require_once __DIR__ . '/../vendor/autoload.php';

class RepositoryTest extends \PHPUnit\Framework\TestCase
{
    public function testRepository()
    {
        $Query = new Query();

        $Car = Car::init($Query)
            ->findById(1)
            ->get();

        $this->assertSame($Car->color, 'red');
    }

    public function testQuery()
    {
        $Query = new Query();
        $Car = Car::init($Query);
        $Car->all();
        $result = $Query->final();

        $this->assertSame($result, 'SELECT * FROM');
    }
}
