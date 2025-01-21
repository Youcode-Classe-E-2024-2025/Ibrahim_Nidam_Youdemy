<?php
namespace UsersModel;

use Model\InterfaceGetCourse;

class StudentModel extends UserModel implements InterfaceGetCourse
{
    public function __construct()
    {
        parent::__construct();
        $this->role = "student";
    }

    public function getAllCourses($userId)
    {
        $enrollments = $this->read('enrollments', ['student_id' => $userId]);

        $courses = [];
        if (!empty($enrollments)) {
            foreach ($enrollments as $enrollment) {
                $course = $this->read('courses', ['id' => $enrollment['course_id']]);
                if (!empty($course)) {
                    $courses[] = $course[0];
                }
            }
        }
        return $courses;
    }
}
