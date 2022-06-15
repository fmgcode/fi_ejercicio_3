<?php

namespace App\Tests\Service;

use App\Service\NumbersService;
use PHPUnit\Framework\TestCase;
use Exception;

class NumbersServiceTest extends TestCase
{
    private NumbersService $service;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->service = new NumbersService();
    }

    /**
     * @dataProvider addNumbersOkProvider
     */
    public function testAddNumbersOk(float $first, float $second, float $expectedResult)
    {
        $result =  $this->service->addNumbers($first, $second);

        $this->assertEquals($expectedResult, $result);
    }

    public function addNumbersOkProvider(): array
    {
        return [
            [2,3,5],
            [1,8,9],
            [-1,3,2],
        ];
    }

    /**
     * @dataProvider divideNumbersOkProvider
     */
    public function testDivideNumbersOk(float $first, float $second, float $expectedResult)
    {
        $result =  $this->service->divideNumbers($first, $second);

        $this->assertEquals($expectedResult, $result);
    }

    public function divideNumbersOkProvider(): array
    {
        return [
            [10,2,5],
            [2,1,2],
            [0,1,0],
        ];
    }

    /**
     * @dataProvider divideNumbersKOProvider
     * @throws \Exception
     */
    public function testDivideNumbersKO(float $first, float $second, string $error)
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cannot divide by zero");

        $this->service->divideNumbers($first, $second);
    }

    public function divideNumbersKOProvider(): array
    {
        return [
            [1,0,"cannot divide by zero"],
        ];
    }
}
