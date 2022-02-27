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

    
}