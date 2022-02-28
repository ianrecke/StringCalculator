<?php

namespace Deg540\PHPTestingBoilerplate\Error;

interface Errors
{
    public function errorMessageInvalidNewLine(string $input_string,string $stringNoSeparator):string;

    public function errorMessageInvalidSeparator(string $input_string,string $stringNoSeparator):string;

    public function errorMessageExpectedNumber($input_string):string;

    public function errorMessageEOF():string;

    public function errorMessageInvalidSeparators(string $input_string):string;

    public function errorMessageInvalidCustomSeparator():string;
}