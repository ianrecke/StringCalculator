<?php


namespace Deg540\PHPTestingBoilerplate\Operations;

class StringCalculatorOperations implements Operations
{

    public function addNewLineSeparator(string $input_string):float
    {
        $delimiters = ["\n",","];
        $newStr = str_replace($delimiters, $delimiters[1], $input_string);
        $FloatNumbers = array_map('floatval',explode(',', $newStr));
        return array_sum($FloatNumbers);
    }

    public function multiplyNewLineSeparator(string $input_string):float
    {
        $delimiters = ["\n",","];
        $newStr = str_replace($delimiters, $delimiters[1], $input_string);
        $FloatNumbers = array_map('floatval',explode(',', $newStr));
        return array_product($FloatNumbers);
    }

    public function addWithCustomSeparator(string $input_string):float
    {
        $separator =substr(explode("\n",$input_string)[0],2);
        $stringNoSeparator = explode("".$separator."\n",$input_string);
        $FloatNumbers = array_map('floatval',explode(''.$separator, $stringNoSeparator[1]));
        return array_sum($FloatNumbers);
    }

    public function multiplyWithCustomSeparator(string $input_string):float
    {
        $separator = substr(explode("\n",$input_string)[0],2);
        $stringNoSeparator = explode("".$separator."\n",$input_string);
        $FloatNumbers = array_map('floatval',explode(''.$separator, $stringNoSeparator[1]));
        return array_product($FloatNumbers);
    }

}