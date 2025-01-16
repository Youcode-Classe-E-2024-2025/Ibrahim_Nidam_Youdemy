<?php
namespace UsersController;

class TeacherController extends UserController {

    public function teacherDash(){
        $this->showView("users/TeacherDash");
    }
}