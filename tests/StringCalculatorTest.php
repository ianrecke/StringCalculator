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
        $res = $this->stringCalculator->add("1,2,5,3");
        $this->assertEquals("11",$res); //assert
    }

    /**
     * @test : check if string is addable
     */
    public function addNumbersTestCustomSeparator(){
        $res = $this->stringCalculator->add("//sep\n1sep2sep5sep3");
        $this->assertEquals("11",$res); //assert
    }

    /**
     * @test : check if string is addable
     */
    public function multiplyNumbersTest(){
        $res = $this->stringCalculator->multiply("5,3");
        $this->assertEquals("15",$res); //assert
    }

    /**
     * @test : check if string is addable
     */
    public function multiplyNumbersTestCustomSeparator(){
        $res = $this->stringCalculator->multiply("//sep\n5sep3");
        $this->assertEquals("15",$res); //assert
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

    /**
     * @test : check if input is valid
     */
    public function ErrorMessageNoNegatives(){
        $res = $this->stringCalculator->add("1,2,-3,2,-5");
        $this->assertEquals("Negatives not allowed: -3 -5 ",$res); //assert
    }
    /**
     * @test : check if input is valid
     */
    public function multipleErrorMessage(){
        $res = $this->stringCalculator->add("1,2,-3,2,-5,");
        $this->assertEquals("Number expected but EOF found.\nNegatives not allowed: -3 -5 ",$res); //assert
    }
}

