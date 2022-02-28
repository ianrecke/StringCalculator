<?php

namespace Deg540\PHPTestingBoilerplate\Rules;

class StringCalculatorRestrictors implements Rule
{


    public function isValidCustomOperator(string $input_string):bool
    {
        if(str_starts_with($input_string,"//"))
            return true;
        else
            return false;
    }

    public function invalidNewLineSeparator(string $input_string):bool
    {
        $newStr = str_replace(" ","",$input_string);
        if (str_contains($newStr,",\n")|| str_contains($newStr,"\n,"))
            return true;
        else
            return false;
    }

    public function missingNumberLastPosition(string $input_string):bool
    {
        $delimiters = ["\n",","];
        $newStr = str_replace($delimiters, $delimiters[1], $input_string);
        if(str_ends_with($newStr,","))
            return true;
        else
            return false;
    }

    public function hasCustomOperator(string $input_string):bool
    {
        if(str_starts_with($input_string,"/"))
            return true;
        else
            return false;
    }



    public function containsNegative(string $input_string):string
    {
        if ($this->hasCustomOperator($input_string)){
            $separator = substr(explode("\n",$input_string)[0],2);
            $delimiters = ["\n",","];
            $newStr = str_replace($delimiters, $separator, $input_string);
            $elements = explode($separator,$newStr);

        }else{
            $delimiters = ["\n",","];
            $newStr = str_replace($delimiters,",", $input_string);
            $elements = explode(",",$newStr);

        }
        $numbers = "";
        foreach ($elements as $element){
            if(floatval($element)<0)
                $numbers.=$element." ";
        }
        if($this->emptyString($numbers))
            return "";
        else
            return "Negatives not allowed: ".$numbers;
    }

    public function emptyString(string $input_string):bool
    {
        if (empty($input_string)){
            return true;
        }else
            return false;
    }

}