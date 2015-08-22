<?php

namespace NeutrinoAPI\Parameter;

class UserId extends \NeutrinoAPI\Parameter\ParameterAbstract
{
    public function __construct($user_id, $name = 'user-id')
    {
        $this->_name = $name;
        $this->_value = $user_id;
        return $this;
    }
}