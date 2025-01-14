<?php

    namespace Controller;

    use Core\Controller;

    class CoursesController extends Controller {

        public function courses(){
            $this->showView("coursesPage");
        }
    }