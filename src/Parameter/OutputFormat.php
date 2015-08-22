<?php

namespace NeutrinoAPI\Parameter;

class OutputFormat extends \NeutrinoAPI\Parameter\ParameterAbstract
{
    public function __construct($output_format, $name = 'output-format')
    {
        $this->_name = $name;
        $this->_value = $output_format;
        return $this;
    }
}