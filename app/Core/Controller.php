<?php

namespace Core;

use CourseModel\CourseModel;
use Model\StatisticsModel;
use Security\Security;

class Controller {
    protected $security;
    protected $courseModel;
    protected $statsModel;

    public function __construct(){
        $this->security = new Security();
        $this->courseModel = new CourseModel();
        $this->statsModel = new StatisticsModel();
    }

    protected function showView($view, $data = []){
        extract($data);

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $flashMessages = [];
        if (isset($_SESSION['flash'])) {
            $flashMessages = $_SESSION['flash'];
            unset($_SESSION['flash']);
        }

        $viewPath = __DIR__ . "/../../app/Views/{$view}.php";
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View '{$view}' not found");
        }
    }

    protected function redirect($url){
        header("Location: {$url}");
        exit();
    }

    protected function setFlash($key, $message){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['flash'][$key] = $message;
    }

    protected function getFlash($key){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['flash'][$key])) {
            $message = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $message;
        }
        return null;
    }
}