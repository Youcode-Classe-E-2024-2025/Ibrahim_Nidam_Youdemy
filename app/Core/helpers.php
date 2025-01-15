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
    $fullStars = floor($rating); // Number of full stars
    $halfStar = ($rating - $fullStars) >= 0.5; // Check if a half star is needed
    $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Remaining empty stars

    $stars = '';

    // Full stars
    for ($i = 0; $i < $fullStars; $i++) {
        $stars .= '★';
    }

    // Half star
    if ($halfStar) {
        $stars .= '½';
    }

    // Empty stars
    for ($i = 0; $i < $emptyStars; $i++) {
        $stars .= '☆';
    }

    return $stars;
}
?>