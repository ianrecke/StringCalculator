<?php


namespace koans\StringCalculator\src;


class StringCalculator
{
    public function emptyString(string $input_string):string{
        if (empty($input_string)){
            return "0";
        }else
            return "String contains values";
    }

    public function stringToFloat(string $input_string):float{
        if ($this->emptyString($input_string) == "0"){
            return "0";
        }else{
            return floatval($input_string);
        }
    }

   
}