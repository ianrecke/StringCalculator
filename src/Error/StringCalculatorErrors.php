<?php

namespace Deg540\PHPTestingBoilerplate\Error;

class StringCalculatorErrors implements Errors
{

    public function errorMessageInvalidNewLine(string $input_string,string $stringNoSeparator):string{
        $separator = substr(explode("\n",$input_string)[0],2);
        $newStr = str_replace("\n", ",", $stringNoSeparator);
        $pos = strpos($newStr, ",");
        return $separator . " expected but '\\n' found at position " . $pos . ".\n";
    }

    public function errorMessageInvalidSeparator(string $input_string,string $stringNoSeparator):string{
        $separator = substr(explode("\n",$input_string)[0],2);
        $newStr = str_replace(",", "\n", $stringNoSeparator);
        $pos = strpos($newStr, "\n");
        return $separator . " expected but ',' found at position " . $pos . ".\n";
    }

    public function errorMessageExpectedNumber($input_string):string{
        $pos = strpos($input_string,"\n");
        return "Number expected but '\\n' found at position ".$pos.".\n";
    }

    public function errorMessageEOF():string{
        return "Number expected but EOF found.\n";
    }

    public function errorMessageInvalidSeparators(string $input_string):string{
        $separator = substr(explode("\n",$input_string)[0],2);
        $stringNoSeparator = explode("" . $separator . "\n", $input_string);
        if (str_contains($stringNoSeparator[1], "\n")) {
            return $this->errorMessageInvalidNewLine($input_string, $stringNoSeparator[1]);
        } elseif (str_contains($stringNoSeparator[1], ",")){
            return $this->errorMessageInvalidSeparator($input_string, $stringNoSeparator[1]);
        }
        return "";
    }

    public function errorMessageInvalidCustomSeparator():string{
        return "Invalid custom operator";
    }

}