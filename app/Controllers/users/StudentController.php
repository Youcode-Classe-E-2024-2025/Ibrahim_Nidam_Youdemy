<?php
namespace Users;

class StudentController extends UserController {

    public function studentProfile(){
        $this->showView("users/StudentProfile");
    }
}