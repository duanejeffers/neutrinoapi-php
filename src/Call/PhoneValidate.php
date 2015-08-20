<?php
namespace NeutrinoAPI\Call;

class PhoneValidate
{
    use CallTrait;
    
    protected $_number;
    
    protected $_country_code;
    
    public function setNumber($number)
    {
        if(substr($number, 0, 1) !== '+')
            $number = '+' . $number;
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
    
    public function getData()
    {
        return [
            'number' => $this->_number,
            'country-code' => $this->_country_code
        ];
    }
}