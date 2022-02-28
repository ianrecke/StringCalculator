<?php


namespace Deg540\PHPTestingBoilerplate;

use Deg540\PHPTestingBoilerplate\Rules\StringCalculatorRestrictors;
use Deg540\PHPTestingBoilerplate\Rules\Rule;

use Deg540\PHPTestingBoilerplate\Operations\Operations;
use Deg540\PHPTestingBoilerplate\Operations\StringCalculatorOperations;

use Deg540\PHPTestingBoilerplate\Error\Errors;
use Deg540\PHPTestingBoilerplate\Error\StringCalculatorErrors;

class StringCalculator
{
    private Rule $rules;
    private Operations $operations;
    private Errors $error;

    public function __construct()
    {
        $this->loadInterfaces();
    }

    private function loadInterfaces(): void
    {
        $this->rules = new StringCalculatorRestrictors();
        $this->operations = new StringCalculatorOperations();
        $this->error = new StringCalculatorErrors();
    }


    public function add(string $input_string):string
    {
        if($this->rules->emptyString($input_string)) {
            return "0";
        }else{
            $errors = $this->errorLogs($input_string);
            if ($this->rules->emptyString($errors))
                if ($this->rules->hasCustomOperator($input_string)){
                    return strval($this->operations->addWithCustomSeparator($input_string));
                }else{
                    return strval($this->operations->addNewLineSeparator($input_string));
                }
            else
                return $errors;
        }
    }

    public function multiply(string $input_string):string
    {

        if($this->rules->emptyString($input_string))
            return "0";
        else{
            $errors = $this->errorLogs($input_string);
            if ($this->rules->emptyString($errors))
                if ($this->rules->hasCustomOperator($input_string)){
                    return strval($this->operations->multiplyWithCustomSeparator($input_string));
                }else{
                    return strval($this->operations->multiplyNewLineSeparator($input_string));
                }
            else
                return $errors;
        }

    }

    public function errorLogs(string $input_string):string
    {
        $errorLog = "";
        if($this->rules->invalidNewLineSeparator($input_string)){
            $errorLog.= $this->error->errorMessageExpectedNumber($input_string);
        }if($this->rules->missingNumberLastPosition($input_string)){
            $errorLog .= $this->error->errorMessageEOF();
        }if($this->rules->hasCustomOperator($input_string) && $this->rules->isValidCustomOperator($input_string)) {
            $errorLog.= $this->error->errorMessageInvalidSeparators($input_string);
        }elseif ($this->rules->hasCustomOperator($input_string) && !$this->rules->isValidCustomOperator($input_string)) {
            $errorLog .= $this->error->errorMessageInvalidCustomSeparator();
        }$errorLog.=$this->rules->containsNegative($input_string);
        return $errorLog;

    }
}