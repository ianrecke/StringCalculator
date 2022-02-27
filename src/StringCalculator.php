<?php


namespace Deg540\PHPTestingBoilerplate;


class StringCalculator
{
    public function add(string $input_string):string{
        if($this->emptyString($input_string))
            return "0";
        else{
            return "String with content";
        }
    }
    private function emptyString(string $input_string):bool{
        if (empty($input_string)){
            return true;
        }else
            return false;
    }

    private function addNumbers(string $input_string):float{
        $FloatNumbers = array_map('floatval',explode(',', $input_string));
        return array_sum($FloatNumbers);
    }

    private function addNewLineSeparator(string $input_string):float{
        if ($this->emptyString($input_string) == "0"){
            return "0";
        }else{
            $delimiters = ["\n",","];
            $newStr = str_replace($delimiters, $delimiters[1], $input_string);
            return $this->addNumbers($newStr);
        }
    }

    private function invalidNewLineSeparator(string $input_string):bool{
        $newStr = str_replace(" ","",$input_string);
        if (str_contains($input_string,",\n")||str_contains($input_string,"\n,"))
            return true;
        else
            return false;
    }

    private function missingNumberLastPosition(string $input_string):bool{
        $delimiters = ["\n",","];
        $newStr = str_replace($delimiters, $delimiters[1], $input_string);
        if(str_ends_with($input_string,","))
            return true;
        else
            return false;
    }

    private function createCustomSeparators(string $input_string):string{

    }
}