<?php
namespace NeutrinoAPI\Call;

use \NeutrinoAPI\Parameters;
use \NeutrinoAPI\Parameter\Number as NumberParam;
use \NeutrinoAPI\Parameter\CountryCode as CountryCodeParam;

class PhoneValidate implements CallInterface
{
    
    protected $_number;
    
    protected $_country_code;
    
    
    public function __construct($number, $country_code = NULL)
    {
        if(substr($number, 0, 1) !== '+')
            $number = '+' . $number;
        $this->_number = $number;
        $this->_country_code = $country_code;
    }
    
    public function params(Parameters &$parameters)
    {
        return $parameters->add(new NumberParam($this->_number))
                          ->add(new CountryCodeParam($this->_country_code));
    }
}