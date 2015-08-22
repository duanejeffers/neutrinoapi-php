<?php

namespace NeutrinoAPI;

use NeutrinoAPI\Parameter\ParameterAbstract;

class Parameters
{
    private $_data = [];
    
    public function add(ParameterAbstract $parameter)
    {
        $this->_data[] = $parameter->paramArray();
        return $this;
    }
    
    public function output()
    {
        $return = array();
        foreach($this->_data as $param) {
            $return = array_merge($return, $param);
        }
        return $return;
    }
}