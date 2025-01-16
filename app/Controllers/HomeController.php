<?php

    namespace Controller;

    use Core\Controller;

    class HomeController extends Controller {

        public function index(){
            $csrfToken = $this->security->generateCsrfToken();
            $randomCourses = $this->courseModel->getRandomCourses();
            $this->showView("home",[
                "csrf_token" => $csrfToken,
                "randomCourses" => $randomCourses
            ]);
        }
    }