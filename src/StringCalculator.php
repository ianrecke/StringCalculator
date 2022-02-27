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

    public function addNumbers(string $input_string):float{
        if ($this->emptyString($input_string) == "0"){
            return "0";
        }else{
            $FloatNumbers = array_map('floatval',explode(',', $input_string));
            return array_sum($FloatNumbers);
        }
    }

    public function addNewLineSeparator(string $input_string):float{
        if ($this->emptyString($input_string) == "0"){
            return "0";
        }else{
            $delimiters = ["\n",","];
            $newStr = str_replace($delimiters, $delimiters[1], $input_string);
            $FloatNumbers = array_map('floatval',explode(',', $newStr));
            return array_sum($FloatNumbers);
        }
    }
}