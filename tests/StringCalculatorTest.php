<?php



declare(strict_types=1);

namespace Deg540\PHPTestingBoilerplate\Test;
use Deg540\PHPTestingBoilerplate\StringCalculator;
use PHPUnit\Framework\TestCase;
use function Sodium\add;

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
     * @test : check if string is addable
     */
    public function addNumbersTest(){
        $res = $this->stringCalculator->add("1,2");
        $this->assertEquals("3",$res); //assert
    }

    /**
     * @test : check if separator is valid
     */
    public function createValidCustomSeparator(){
        $res = $this->stringCalculator->hasCustomOperator("/sep\n");
        $this->assertEquals(false,$res); //assert
    }
    /**
     * @test : check if input is valid
     */
    public function ErrorMessageExpectedNumber()
    {
        $res = $this->stringCalculator->add("1,\n2");
        $this->assertEquals("Number expected but '\\n' found at position 2.\n",$res); //assert
    }
    /**
     * @test : check if input is valid
     */
    public function ErrorMessageExpectedNumberButEof(){
        $res = $this->stringCalculator->add("1,2,");
        $this->assertEquals("Number expected but EOF found.\n",$res); //assert
    }
}

