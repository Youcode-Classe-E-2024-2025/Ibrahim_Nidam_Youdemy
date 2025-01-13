<?php

    namespace Middleware;

    class AuthMiddleware {

        public function handle(){
            session_start();

            if(!isset($_SESSION["user"])){
                header("Location: /login");
                exit();
            }

            return true;
        }
    }