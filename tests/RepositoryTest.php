<?php
require_once __DIR__ . '/../vendor/autoload.php';

class RepositoryTest extends \PHPUnit\Framework\TestCase
{
    public function testRepository()
    {
        $mockedData = [
            'color' => 'red'
        ];

        $mock = $this->createMock(Query::class);
        $mock->method('run')->willReturn($mockedData);

        $Car = Car::init($mock)
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

    public function testWhereQuery()
    {
        $Query = new Query();
        $Car = Car::init($Query)
            ->select()
            ->get();

        $this->assertCount(2, $Car);
    }

    public function testFindByIdQueryBuilder()
    {
        $Query = new Query();
        $Car = Car::init($Query)
            ->findById(2)
            ->get();

        $result = $Query->final();

        $this->assertSame($result, 'SELECT * FROM car WHERE id = 2');
    }
}
