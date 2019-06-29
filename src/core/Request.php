<?php
namespace Core;

class Request{
    public $server = [];
    private $requestUri;
    function __construct(){
        $this->server = $_SERVER;
        //print_r($this->server['argv']);
        //print_r($this->server['REQUEST_URI']);
        if ($this->Cli()) {

            if (empty($this->server['argv'][0])){
                return $this->requestUri = $this->server['argv'][0] ;
            }else{
                return $this->requestUri = '/'. trim($this->server['argv'][0], '/');
            }

        } else {
            return $this->requestUri = ltrim($this->server['REQUEST_URI'], '/' );
        }
    }
    public function getUri(){
        return $this->requestUri;
    }
    public function Cli(){
        return (php_sapi_name() === 'cli');
    }
}