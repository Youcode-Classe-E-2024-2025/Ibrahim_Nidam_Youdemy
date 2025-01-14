<?php

    namespace Core;

    class App {
        public static $router;

        public function __construct(){
            self::$router = new Router();
        }

        public function run(){
            $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
            $method = $_SERVER["REQUEST_METHOD"];
            self::$router->route($uri, $method);
        }
    }