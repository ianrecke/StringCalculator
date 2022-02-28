<?php

namespace Deg540\PHPTestingBoilerplate\Operations;

interface Operations
{
    public function addNewLineSeparator(string $input_string):float;

    public function multiplyNewLineSeparator(string $input_string):float;

    public function addWithCustomSeparator(string $input_string):float;

    public function multiplyWithCustomSeparator(string $input_string):float;

}