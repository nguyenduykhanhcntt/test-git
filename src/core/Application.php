<?php
namespace Core;
class Xuly{

    /**
     * @var Request
     */
    public $request;
    /**
     * @var Router
     */
    public $router;
    public $getRR;
    public $uri;
    public function getRoute(Router $router){
       $this->router = $router;
      $this->getRR = $router->resouces;
    }
    public function getRequest(Request $request){
        $this->request = $request;
        $this->uri = $request->getUri();
    }
    public function run(){
       //print_r($this->uri);
        $this->router->getRequestInRoute($this->request);

    }
}