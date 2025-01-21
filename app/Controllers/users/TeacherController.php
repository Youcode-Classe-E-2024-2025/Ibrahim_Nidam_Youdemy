<?php
namespace UsersController;

use UsersModel\TeacherModel;

class TeacherController extends UserController
{
    protected $teacherModel;

    public function __construct()
    {
        parent::__construct();
        $this->teacherModel = new TeacherModel();
    }

    public function teacherDash()
    {
        if (!isset($_SESSION['id']) || ($_SESSION['role'] !== 'teacher' && $_SESSION['role'] !== 'pending_teacher')) {
            $this->setFlash("error", "You must be logged in as a teacher to access this page.");
            $this->redirect("../../Public");
            return;
        }

        $teacherId = $_SESSION['id'] ?? null;

        $data = [
            'total_courses' => $this->teacherModel->getAllCourses($teacherId),
            'total_students' => $this->teacherModel->getTotalStudents($teacherId),
            'pending_courses' => $this->teacherModel->getPendingCourses($teacherId),
            'courses' => $this->courseModel->getCoursesByTeacher($teacherId),
            'categories' => $this->categories->getAllCats(),
            'tags' => $this->tags->getAllTags(),
            'csrf_token' => $this->security->generateCsrfToken(),
        ];

        $this->showView("users/TeacherDash", $data);
    }

    public function handleActions()
    {
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!$this->security->verifyCsrfToken($csrfToken)) {
            $this->setFlash("error", "Invalid CSRF token.");
            $this->redirect("../users/TeacherDash");
        }

        $action = $_POST['action'] ?? '';
        $id = $_POST['id'] ?? '';

        switch ($action) {
            case 'delete_course':
                if ($this->courseModel->deleteCourse($id)) {
                    $this->setFlash("success", "Course deleted successfully!");
                } else {
                    $this->setFlash("error", "Failed to delete course.");
                }
                break;

            default:
                $this->setFlash("error", "Invalid action.");
        }

        $this->redirect("../../users/TeacherDash");
    }
}
