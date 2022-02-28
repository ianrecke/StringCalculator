<?php



namespace Deg540\PHPTestingBoilerplate\Rules;


interface Rule
{
    public function isValidCustomOperator(string $input_string):bool;

    public function invalidNewLineSeparator(string $input_string):bool;

    public function missingNumberLastPosition(string $input_string):bool;

    public function hasCustomOperator(string $input_string):bool;

    public function containsNegative(string $input_string):string;

    public function emptyString(string $input_string):bool;
}