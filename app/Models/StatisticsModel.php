<?php

namespace Model;

use Core\Model;
use PDO;

class StatisticsModel extends Model{
    
    public function getTotalCourses(){
        $sql = "SELECT COUNT(*) as total_courses FROM courses";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)["total_courses"];
    }

    public function getCoursesByCategory(){
        $sql = "SELECT c.name as category_name, COUNT(co.id) as course_count
                FROM categories c
                LEFT JOIN courses co ON c.id = co.category_id
                GROUP BY c.id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCourseWithMostStudents(){
        $sql = "SELECT co.title, COUNT(e.id) as student_count
                FROM courses co
                LEFT JOIN enrollments e ON co.id = e.course_id
                GROUP BY co.id
                ORDER BY student_count DESC
                LIMIT 1
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTopTeachers(){
        $sql = "SELECT u.name, COUNT(c.id) as course_count
                FROM users u
                LEFT JOIN courses c ON u.id = c.teacher_id
                WHERE u.role = 'teacher'
                GROUP BY u.id
                ORDER BY course_count DESC
                LIMIT 3
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalCoursesByTeacher($teacherId){
        $sql = "SELECT COUNT(*) as total_courses
                FROM courses
                WHERE teacher_id = :teacher_id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([":teacher_id" => $teacherId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)["total_courses"];
    }

    public function getTotalStudentsByTeacher($teacherId){
        $sql = "SELECT COUNT(DISTINCT e.student_id) as total_students
                FROM enrollments e
                LEFT JOIN courses c ON e.course_id = c.id
                WHERE c.teacher_id = :teacher_id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["teacher_id" => $teacherId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)["total_students"];
    }

    public function getPendingCoursesByTeacher($teacherId){
        $sql = "SELECT COUNT(*) as pending_courses
                FROM courses
                WHERE teacher_id = :teacher_id AND approval = 'pending'
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(["teacher_id" => $teacherId]);
        return $stmt->fetch(PDO::FETCH_ASSOC)["pending_courses"];
    }
}