<?php
namespace NeutrinoAPI;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected $_base_url = 'https://neutrinoapi.com/';
    
    protected $_client;
    
    protected $_user_id;
    
    protected $_api_key;
    
    protected $_output_format = "json";
    
    protected $_output_case = "kebab";
    
    protected $_method = 'POST';
    
    public function __construct($user_id, $api_key)
    {
        $this->_user_id = $user_id;
        $this->_api_key = $api_key;
        
        $this->_client = new GuzzleClient(['base_uri' => $this->_base_url]);
        
        return $this;
    }
    
    public function __call($name, $args) {
        $endpoint = strtolower(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', '-$0', $name));
        $class = 'NeutrinoAPI\\Call\\' . ucfirst($name);
        
        $call = new $class(...$args);
        
        $call->setCredentials($this->_user_id, $this->_api_key);
        
        switch(strtoupper($this->_method)) {
            case 'POST':
                $option_key = 'form_params';
                break;
            
            case 'GET':
                $option_key = 'query';
                break;
        }
        
        $request = $this->_client->request($this->_method, $endpoint, [
            $option_key => $call->requestVariables()
        ]);
        
        return json_decode($request->getBody()->getContents());
    }
}