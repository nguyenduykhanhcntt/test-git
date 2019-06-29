<?php
namespace Core;
class Router{
    public $resouces = [];
    public $request;
    public $uri;
    public $defaultBracePattern = '([a-zA-Z0-9\-]+)';
    public $nhanlai;
    public $pageNotFoundRouteUri = '**';

    public function __construct($path)
    {
        $router = $this;
        require_once $path;
    }

    public function get($url, $str, $callable = []){
        return $this->resouces['/' . trim($url ,'/')] = $str;
    }

    public function getRequestInRoute(Request $request){

        $resources = $this->resouces;


        $uri = '/'. trim($request->getUri(),'/');

         if (!empty($resources[$uri])){
           $this->nhanlai =  $resources[$uri];
         }

         foreach ($resources as $key => $value){

            print_r($value);
        }
    }

}