<?php
namespace NeutrinoAPI\Call;

class PhoneValidate implements CallInterface
{
    use CallTrait;
    
    protected $_number;
    
    protected $_country_code;
    
    public function setNumber($number)
    {
        $this->_number = $number;
        return $this;
    }
    
    public function setCountryCode($code)
    {
        $this->_country_code = $code;
        return $this;
    }
    
    public function __construct($number, $country_code = NULL)
    {
        $this->setNumber($number)->setCountryCode($country_code);
    }
    
    public function requestVars()
    {
        return array_merge([
            'number' => $this->_number
        ], $this->getCredentials(),
        (!is_null($this->_country_code) ? ['country-code' => $this->_country_code] : []));
    }
}