<?php

namespace Controller;

use Core\Controller;

class statisticsController extends Controller {

    public function adminStats(){
        $data = [
            "total_courses" => $this->statsModel->getTotalCourses(),
            "courses_by_category" => $this->statsModel->getCoursesByCategory(),
            "course_with_most_students" => $this->statsModel->getCourseWithMostStudents(),
            "top_teachers" => $this->statsModel->getTopTeachers()
        ];

        $this->showView("users/AdminDash", $data);
    }

    public function teacherStats(){
        $teacherId = $_SESSION["id"];
        $data = [
            "total_courses" => $this->statsModel->getTotalCoursesByTeacher($teacherId),
            "total_students" => $this->statsModel->getTotalStudentsByTeacher($teacherId),
            "pending_courses" => $this->statsModel->getPendingCoursesByTeacher($teacherId)
        ];

        $this->showView("users/TeacherDash", $data);
    }
}