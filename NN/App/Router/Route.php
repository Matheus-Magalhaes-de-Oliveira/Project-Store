<?php

namespace App\Router;


class Route {

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    private $uri; 
    private $method; 
    private $class;
    private $functionName;

    function __construct($uri, $method, $class, $functionName){
        $this->uri = $uri;
        $this->method = $method;
        $this->class = $class;
        $this->functionName = $functionName;
    }

    function getUri(){
        return $this->uri;
    }

    function getMethod(){
        return $this->method;
    }

    function getClass(){
        return $this->class;
    }

    function getFunctionName(){
        return $this->functionName;
    }

    function setUri($uri){
        $this->uri = $uri;
    }

    function setMethod($method){
        $this->method = $method;
    }

    function setClass($class){
        $this->class = $class;
    }

    function setFunctionName($functionName){
        $this->functionName = $functionName;
    }
}
