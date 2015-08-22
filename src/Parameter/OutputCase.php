<?php

namespace NeutrinoAPI\Parameter;

class OutputCase extends \NeutrinoAPI\Parameter\ParameterAbstract
{
    public function __construct($output_case, $name = 'output-case')
    {
        $this->_name = $name;
        $this->_value = $output_case;
        return $this;
    }
}