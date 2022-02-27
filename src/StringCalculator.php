<?php


namespace Deg540\PHPTestingBoilerplate;


use function PHPUnit\Framework\stringStartsWith;

class StringCalculator
{
    public function add(string $input_string):string{
        if($this->emptyString($input_string))
            return "0";
        else{
            $errors = $this->errorLogs($input_string);
            if ($this->emptyString($errors))
                if ($this->hasCustomOperator($input_string)){
                    return strval($this->addWithCustomSeparator($input_string));
                }else{
                    return strval($this->addNewLineSeparator($input_string));
                }
            else
                return $errors;
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
    //contains the function errors
    private function errorLogs(string $input_string):string{
        $errorLog = "";
        if($this->invalidNewLineSeparator( $input_string)){
            $pos = strpos($input_string,",\n");
            $errorLog.="Number expected but '\\n' found at position ".$pos.".\n";
        }
        if($this->missingNumberLastPosition($input_string))
            $errorLog.="Number expected but EOF found.\n";
        if($this->hasCustomOperator($input_string)){
            if($this->addWithCustomSeparatorRestriction($input_string)){
                $separator = $this->createCustomSeparators($input_string);
                $newStr = str_replace("\n", ",", $input_string);
                $pos = strpos($newStr,",");
                $errorLog.= $separator." expected but ',' found at position ".$pos.".\n";
            }
        }
    }

    private function invalidNewLineSeparator(string $input_string):bool{
        $newStr = str_replace(" ","",$input_string);
        if (str_contains($input_string,",\n"))
            return true;
        else
            return false;
    }

    private function missingNumberLastPosition(string $input_string):bool{
        $delimiters = ["\n",","];
        $newStr = str_replace($delimiters, $delimiters[1], $input_string);
        if(str_ends_with($newStr,","))
            return true;
        else
            return false;
    }

    public function hasCustomOperator(string $input_string):bool{
        if(str_starts_with($input_string,"//"))
            return true;
        else
            return false;
    }

    private function createCustomSeparators(string $input_string):string{
        //contents is split in 2, first half contains the separator
        $contents= explode("\n",$input_string);
        return substr($contents[0],2);
    }

    private function addWithCustomSeparatorRestriction(string $input_string):bool{
        $separator = $this->createCustomSeparators($input_string);
        if(str_contains($input_string,",")||str_contains($input_string,"\n")){
            return true;
        }else{
            return false;
        }
    }
    private function addWithCustomSeparator(string $input_string):float{

        $separator = $this->createCustomSeparators($input_string);
        $FloatNumbers = array_map('floatval',explode(''.$separator, $input_string));
        return array_sum($FloatNumbers);

    }


}