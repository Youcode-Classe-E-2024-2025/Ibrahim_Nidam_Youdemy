<?php
namespace Users;

class TeacherController extends UserController {

    public function teacherDash(){
        $this->showView("users/TeacherDash");
    }
}