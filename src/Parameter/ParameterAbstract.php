<?php

namespace NeutrinoAPI\Parameter;

abstract class ParameterAbstract
{
    protected $_name;
    protected $_value;
    
    public function paramArray()
    {
        return [$this->_name => $this->_value];
    }
}