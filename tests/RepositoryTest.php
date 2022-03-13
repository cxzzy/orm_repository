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

    public function testMultipleResults()
    {
        $mockedData = [
            [
                'color' => 'red'
            ],
            [
                'color' => 'red'
            ],
        ];

        $mock = $this->createMock(Query::class);
        $mock->method('run')->willReturn($mockedData);
        $Car = Car::init($mock)
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

    public function testDeleteQueryBuilder()
    {
        $Query = new Query();
        $Car = Car::init($Query)
            ->delete()
            ->where(['color' => 'red'])
            ->get();

        $result = $Query->final();

        $this->assertSame($result, 'DELETE FROM car WHERE color = red');
    }

    public function testWhereQueryBuilder()
    {
        $Query = new Query();
        $Car = Car::init($Query)
            ->select()
            ->where(['color' => 'red'])
            ->get();

        $result = $Query->final();

        $this->assertSame($result, 'SELECT * FROM car WHERE color = red');
    }

    public function testLimitQueryBuilder()
    {
        $Query = new Query();
        $Car = Car::init($Query)
            ->select()
            ->where(['color' => 'red'])
            ->limit([1,2])
            ->get();

        $result = $Query->final();

        $this->assertSame($result, 'SELECT * FROM car WHERE color = red LIMIT 2,1');
    }
}
