<?php

namespace NeutrinoAPI\Call;

trait CallTrait
{
    protected $_user_id;
    
    protected $_api_key;
    
    public function setAPIKey($api_key) {
        $this->_api_key = $api_key;
        return $this;
    }
    
    public function setUser($user_id) {
        $this->_user_id = $user_id;
        return $this;
    }
    
    public function setCredentials($user_id, $api_key) {
        return $this->setUser($user_id)->setAPIKey($api_key);
    }
    
    public function getCredentials() {
        return [
            'user-id' => $this->_user_id,
            'api-key' => $this->_api_key
        ];
    }
    
    public function requestVariables() {
        return array_merge($this->getCredentials(), $this->getData());
    }
    
    abstract public function getData();
}