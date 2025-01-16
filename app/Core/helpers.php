<?php


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

function generateStars($rating) {
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);

    $stars = '';

    for ($i = 0; $i < $fullStars; $i++) {
        $stars .= '★';
    }

    if ($halfStar) {
        $stars .= '½';
    }

    for ($i = 0; $i < $emptyStars; $i++) {
        $stars .= '☆';
    }

    return $stars;
}


function getCurrentPage() {
    $urlPath = $_SERVER['REQUEST_URI'];
    $urlPath = strtok($urlPath, '?');
    $urlPath = rtrim($urlPath, '/');
    $lastPart = basename($urlPath);
    if (empty($lastPart)) {
        return 'home';
    }
    return $lastPart;
}

function getBaseUrl() {
    // Get protocol (HTTP or HTTPS)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://';
    // Get host (e.g., localhost or domain)
    $host = $_SERVER['HTTP_HOST'];
    // Get the path to the project (e.g., /Youdemy/)
    $path = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    return $protocol . $host . $path; // Full base URL
}

define('BASE_URL', getBaseUrl());
