<?php
namespace NeutrinoAPI\Call;

class EmailValidate
{
    use CallTrait;
    
    protected $_email;
    
    protected $_fix_typos;
    
    public function setEmail($email)
    {
        if(substr($number, 0, 1) !== '+')
            $number = '+' . $number;
        $this->_number = $number;
        return $this;
    }
    
    public function setFixTypos($code)
    {
        $this->_fix_typos = $code;
        return $this;
    }
    
    public function __construct($email, $fix_typos = NULL)
    {
        $this->setEmail($email)->setFixTypos($fix_typos);
    }
    
    public function getData()
    {
        return [
            'email' => $this->_email,
            'fix-typos' => $this->_fix_typos
        ];
    }
}