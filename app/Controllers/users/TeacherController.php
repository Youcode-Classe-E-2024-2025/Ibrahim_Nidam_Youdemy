<?php
namespace UsersController;

class TeacherController extends UserController {

    public function teacherDash() {
        $teacherId = $_SESSION['id'] ?? null;

        $total_courses = $this->stats->getTotalCoursesByTeacher($teacherId);
        $total_students = $this->stats->getTotalStudentsByTeacher($teacherId);
        $pending_courses = $this->stats->getPendingCoursesByTeacher($teacherId);

        $data = [
            'total_courses' => $total_courses,
            'total_students' => $total_students,
            'pending_courses' => $pending_courses,
        ];

        $this->showView("users/TeacherDash", $data);
    }
}