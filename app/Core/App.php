<?php

    namespace Core;

    class App {
        public static $router;

        public function __construct(){
            self::$router = new Router();
        }

        public function run() {
            // Get the request URI and decode it
            $uri = rawurldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    
            // Dynamically determine the base path
            $scriptName = dirname($_SERVER["SCRIPT_NAME"]);
            $basePath = rtrim($scriptName, '/');
    
            // Remove the base path from the URI
            if (strpos($uri, $basePath) === 0) {
                $uri = substr($uri, strlen($basePath));
            }
    
            // Ensure the URI starts with a slash
            $uri = '/' . ltrim($uri, '/');
    
            // Get the request method
            $method = $_SERVER["REQUEST_METHOD"];
    
            // Route the request
            self::$router->route($uri, $method);
        }
    }