<?php
namespace UsersController;

class TeacherController extends UserController {

    public function teacherDash() {
        $teacherId = $_SESSION['id'] ?? null;

        $total_courses = $this->stats->getTotalCoursesByTeacher($teacherId);
        $total_students = $this->stats->getTotalStudentsByTeacher($teacherId);
        $pending_courses = $this->stats->getPendingCoursesByTeacher($teacherId);
        $courses = $this->courseModel->getCoursesByTeacher($teacherId);

        $categories = $this->courseModel->getAllCategories();
        $tags = $this->courseModel->getAllTags();

        $data = [
            'total_courses' => $total_courses,
            'total_students' => $total_students,
            'pending_courses' => $pending_courses,
            'courses' => $courses,
            'categories' => $categories,
            'tags' => $tags,
            'csrf_token' => $this->security->generateCsrfToken(),
        ];

        $this->showView("users/TeacherDash", $data);
    }

    public function handleActions() {
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

        $this->redirect("../users/TeacherDash");
    }
}