<?php

    namespace Core;

    if(!function_exists("dd")){
        function dd(...$vars){
            echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px;'>";
            foreach($vars as $var){
                var_dump($var);
                echo "\n\n";
            }
            echo "</pre>";
            die();
        }
    }

    if(!function_exists("dump")){
        function dump(...$vars){
            echo "<pre style='background-color: #f4f4f4; padding: 10px; border-radius: 5px;'>";
            foreach($vars as $var){
                var_dump($var);
                echo "\n\n";
            }
            echo "</pre>";
        }
    }