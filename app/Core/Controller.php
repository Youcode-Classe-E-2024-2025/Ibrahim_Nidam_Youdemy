<?php

    namespace Core;

    class Controller {

        protected function showView($view, $data = []){
            extract($data);

            $viewPath = __DIR__ . "/../../app/Views/{$view}.php";

            // var_dump("Attempting to load view from: " . $viewPath);
            // var_dump("View exists: " . (file_exists($viewPath) ? 'Yes' : 'No'));
            
            if(file_exists($viewPath)){
                require_once $viewPath;
            } else {
                die("View '{$view}' not found");
            }
        }

        protected function redirect ($url){
            header("Location: {$url}");
            exit();
        }

        protected function setFlash($key, $message){
            session_start();
            $_SESSION["flash"][$key] = $message;
        }

        protected function getFlash($key){
            session_start();
            if(isset($_SESSION["flash"][$key])){
                $message = $_SESSION["flash"][$key];
                unset($_SESSION["flash"][$key]);
                return $message;
            }
            return null;
        }
    }