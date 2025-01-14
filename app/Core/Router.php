<?php

    namespace Core;

    class Router {
        protected $routes = [];

        public function get($uri, $controller) {
            $this->routes["GET"][$uri] = $controller;
        }

        public function post($uri, $controller){
            $this->routes["POST"][$uri] = $controller;
        }

        public function route($uri, $method){
            
            if(array_key_exists($method, $this->routes) && array_key_exists($uri, $this->routes[$method])){
                $controller = $this->routes[$method][$uri];

                if(is_array($controller)){
                    [$class, $method] = $controller;
                    $controller = new $class();
                    return $controller->$method();
                }
            }

            $this->handleError(404);
        }

        public function handleError($code){

            http_response_code($code);

            switch($code){
                case 404:
                    require_once __DIR__ . "/../Views/errors/404.php";
                break;
                case 403 : 
                    require_once __DIR__ . "/../Views/errors/403.php";
                break;
                default : 
                echo "{$code}";
            }

            exit();
        }
    }