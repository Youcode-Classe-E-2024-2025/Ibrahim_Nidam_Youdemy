<?php

namespace UsersController;

class StudentController extends UserController {

    public function studentProfile() {
        if (!isset($_SESSION['id']) || $_SESSION['role'] !== 'student') {
            $this->setFlash("error", "You must be logged in as a student to access this page.");
            $this->redirect("../../Public");
            return;
        }
    
        $studentId = $_SESSION['id'];
    
        // Fetch enrolled course IDs
        $enrollments = $this->courseModel->read('enrollments', ['student_id' => $studentId]);
    
        $courses = [];
        if (!empty($enrollments)) {
            // Fetch courses one by one if the model cannot handle arrays
            foreach ($enrollments as $enrollment) {
                $course = $this->courseModel->read('courses', ['id' => $enrollment['course_id']]);
                if (!empty($course)) {
                    $courses[] = $course[0]; // Extract the first record
                }
            }
        }
    
        $this->showView("users/StudentProfile", [
            "courses" => $courses
        ]);
    }
    
}
