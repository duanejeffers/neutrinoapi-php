<?php

namespace NeutrinoAPI\Parameter;

class ApiKey extends \NeutrinoAPI\Parameter\ParameterAbstract
{
    public function __construct($api_key, $name = 'api-key')
    {
        $this->_name = $name;
        $this->_value = $api_key;
        return $this;
    }
}