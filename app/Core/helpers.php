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
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $path = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    return $protocol . $host . $path;
}

define('BASE_URL', getBaseUrl());


function renderPagination($currentPage, $totalPages, $baseUrl = '?page=') {
    $pagination = '<nav class="inline-flex items-center space-x-2">';

    if ($currentPage > 1) {
        $pagination .= '<a href="' . $baseUrl . ($currentPage - 1) . '" class="px-4 py-2 bg-card border text-accent rounded hover:bg-muted">Previous</a>';
    }

    if ($currentPage > 4) {
        $pagination .= '<a href="' . $baseUrl . '1" class="px-4 py-2 bg-card border text-accent rounded hover:bg-muted">1</a>';
        $pagination .= '<span class="px-2">...</span>';
    }

    for ($i = max(1, $currentPage - 3); $i < $currentPage; $i++) {
        $pagination .= '<a href="' . $baseUrl . $i . '" class="px-4 py-2 bg-card border text-accent rounded hover:bg-muted">' . $i . '</a>';
    }

    $pagination .= '<span class="px-4 py-2 bg-primary text-white rounded">' . $currentPage . '</span>';

    for ($i = $currentPage + 1; $i <= min($totalPages, $currentPage + 3); $i++) {
        $pagination .= '<a href="' . $baseUrl . $i . '" class="px-4 py-2 bg-card border text-accent rounded hover:bg-muted">' . $i . '</a>';
    }

    if ($currentPage < $totalPages - 3) {
        $pagination .= '<span class="px-2">...</span>';
        $pagination .= '<a href="' . $baseUrl . $totalPages . '" class="px-4 py-2 bg-card border text-accent rounded hover:bg-muted">' . $totalPages . '</a>';
    }

    if ($currentPage < $totalPages) {
        $pagination .= '<a href="' . $baseUrl . ($currentPage + 1) . '" class="px-4 py-2 bg-card border text-accent rounded hover:bg-muted">Next</a>';
    }

    $pagination .= '</nav>';

    return $pagination;
}
