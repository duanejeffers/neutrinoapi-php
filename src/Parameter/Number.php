<?php

namespace NeutrinoAPI\Parameter;

class Number extends \NeutrinoAPI\Parameter\ParameterAbstract
{
    public function __construct($number, $name = 'number')
    {
        $this->_name = $name;
        $this->_value = $number;
        return $this;
    }
}