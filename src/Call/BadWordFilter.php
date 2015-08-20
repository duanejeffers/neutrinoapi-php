<?php
namespace NeutrinoAPI\Call;

class BadWordFilter
{
    use CallTrait;
    
    protected $_content;
    
    protected $_censor_character;
    
    public function setContent($content)
    {
        if(substr($number, 0, 1) !== '+')
            $number = '+' . $number;
        $this->_number = $number;
        return $this;
    }
    
    public function setCensorCharacter($code)
    {
        $this->_censor_character = $code;
        return $this;
    }
    
    public function __construct($content, $censor_character = NULL)
    {
        $this->setContent($content)->setCensorCharacter($censor_character);
    }
    
    public function getData()
    {
        return [
            'content' => $this->_content,
            'censor-character' => $this->_censor_character
        ];
    }
}