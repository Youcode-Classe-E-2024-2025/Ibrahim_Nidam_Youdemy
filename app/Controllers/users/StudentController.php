<?php
namespace UsersController;

use UsersModel\StudentModel;

class StudentController extends UserController
{
    protected $studentModel;

    public function __construct()
    {
        parent::__construct();
        $this->studentModel = new StudentModel();
    }

    public function studentProfile()
    {
        if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'student') {
            $this->setFlash("error", "You must be logged in as a student to access this page.");
            $this->redirect("../../Public");
            return;
        }

        $studentId = $_SESSION['id'];

        $courses = $this->studentModel->getAllCourses($studentId);

        $this->showView("users/StudentProfile", [
            "courses" => $courses
        ]);
    }
}
