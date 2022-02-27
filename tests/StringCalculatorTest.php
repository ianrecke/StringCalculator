<?php



declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;
use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{

    /**
     * @setUp
     */
    protected function setUp():void{
        parent::setUp();
        $this->stringCalculator=  new StringCalculator();
    }

    /**
     * @test : check if string is empty
     */
    public function string_is_empty(){
        $res = $this->stringCalculator->add("");
        $this->assertEquals("0",$res); //assert
    }

    /**
     * @test : check if string is empty
     */
    public function addNumbersTest(){
        $res = $this->stringCalculator->add("1,2");
        $this->assertEquals("3",$res); //assert
    }
}
