<?php

    namespace Core;

    class App {
        public static $router;

        public function __construct(){
            self::$router = new Router();
        }

        public function run() {
            $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        
            $basePath = "/%5b11%5d%20Plateforme%20de%20Cours%20en%20Ligne%20Youdemy/Public";
            if (strpos($uri, $basePath) === 0) {
                $uri = substr($uri, strlen($basePath));
            }
        
            $method = $_SERVER["REQUEST_METHOD"];
            self::$router->route($uri, $method);
        }
    }