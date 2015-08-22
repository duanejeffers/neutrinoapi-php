<?php

namespace NeutrinoAPI\Parameter;

class CountryCode extends \NeutrinoAPI\Parameter\ParameterAbstract
{
    public function __construct($country_code, $name = 'country-code')
    {
        $this->_name = $name;
        $this->_value = $country_code;
        return $this;
    }
}