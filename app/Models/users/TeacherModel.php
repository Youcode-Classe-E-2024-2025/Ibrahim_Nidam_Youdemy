<?php
namespace UsersModel;

use Model\InterfaceGetCourse;

class TeacherModel extends UserModel implements InterfaceGetCourse
{
    public function __construct()
    {
        parent::__construct();
        $this->role = "teacher";
    }

    public function getAllCourses($userId){
        return count($this->read("courses", ["teacher_id" => $userId]));
    }

    public function getTotalStudents($teacherId)
    {
        $courses = $this->read('courses', ['teacher_id' => $teacherId]);
        $totalStudents = 0;

        foreach ($courses as $course) {
            $enrollments = $this->read('enrollments', ['course_id' => $course['id']]);
            $totalStudents += count($enrollments);
        }

        return $totalStudents;
    }

    public function getPendingCourses($teacherId)
    {
        return $this->read('courses', [
            'teacher_id' => $teacherId,
            'approval' => 'pending'
        ]);
    }

    public function getPendingTeachers()
    {
        return $this->read($this->table, ['role' => 'pending_teacher']);
    }

    public function approveTeacher($id)
    {
        return $this->update($this->table, ['role' => 'teacher'], ['id' => $id]);
    }

    public function rejectTeacher($id)
    {
        return $this->delete($this->table, ['id' => $id]);
    }
}
