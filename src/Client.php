<?php
namespace NeutrinoAPI;

use \NeutrinoAPI\Parameter\ApiKey as ApiKeyParam;
use \NeutrinoAPI\Parameter\UserId as UserIdParam;
use \NeutrinoAPI\Parameter\OutputCase as OutputCaseParam;
use \NeutrinoAPI\Parameter\OutputFormat as OutputFormatParam;
use GuzzleHttp\Client as GuzzleClient;

class Client
{
    protected $_base_url = 'https://neutrinoapi.com/';
    
    protected $_client;
    
    protected $_parameters;
    
    protected $_method = 'POST';
    
    public function __construct($user_id, $api_key, $output_case = 'camel', $output_format = 'json', $method = 'POST')
    {
        $this->_parameters = new Parameters();
        $this->_parameters->add(new ApiKeyParam($api_key))
                          ->add(new UserIdParam($user_id))
                          ->add(new OutputCaseParam($output_case))
                          ->add(new OutputFormatParam($output_format));
        $this->_method = $method;
        
        $this->_client = new GuzzleClient(['base_uri' => $this->_base_url]);
        
        return $this;
    }
    
    public function __call($name, $args) {
        $endpoint = strtolower(preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', '-$0', $name));
        $class = 'NeutrinoAPI\\Call\\' . ucfirst($name);
        
        $call = new $class(...$args);
        
        switch(strtoupper($this->_method)) {
            case 'POST':
                $option_key = 'form_params';
                break;
            
            case 'GET':
                $option_key = 'query';
                break;
        }
        
        $request = $this->_client->request($this->_method, $endpoint, [
            $option_key => $call->params($this->_parameters)->output()
        ]);
        
        return json_decode($request->getBody()->getContents());
    }
}