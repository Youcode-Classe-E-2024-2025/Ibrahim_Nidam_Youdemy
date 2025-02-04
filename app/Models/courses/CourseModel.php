<?php

namespace CourseModel;

use Core\Model;
use PDO;

class CourseModel extends Model {

    public function getCourses($limit = 10, $offset = 0) {
        $sql = "SELECT c.*, 
                    GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags
                FROM courses c
                LEFT JOIN course_tags ct ON c.id = ct.course_id
                LEFT JOIN tags t ON ct.tag_id = t.id
                GROUP BY c.id
                LIMIT $limit OFFSET $offset";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getCoursesByTag($tagName) {
        $sql = "SELECT c.*, 
                    GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags
                FROM courses c
                INNER JOIN course_tags ct ON c.id = ct.course_id
                INNER JOIN tags t ON ct.tag_id = t.id
                WHERE t.name = :tagName
                GROUP BY c.id";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':tagName' => $tagName]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotalCourses() {
        $sql = "SELECT COUNT(*) AS total FROM courses";
        $stmt = $this->db->query($sql);
        return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function getRandomCourses($limit = 3) {
        $sql = "SELECT c.*, 
                    GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags
                FROM courses c
                LEFT JOIN course_tags ct ON c.id = ct.course_id
                LEFT JOIN tags t ON ct.tag_id = t.id
                GROUP BY c.id
                ORDER BY RAND()
                LIMIT $limit";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchCourses($keyword) {
        $sql = "SELECT * FROM courses WHERE title LIKE :keyword OR description LIKE :keyword";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function createCourse($data){
        $courseId = $this->create("courses", $data);
        return $courseId;
    }

    public function attachTagsToCourses($courseId, $tags = []){
        foreach ($tags as $tagName) {
            $this->create("tags", ["name" => $tagName]);
            $tagRow = $this->read("tags", ["name" => $tagName]);

            if($tagRow){
                $tagId = $tagRow[0]["id"];

                $this->create("course_tags",  [
                    "course_id" => $courseId,
                    "tag_id" => $tagId
                ]);
            }
        }
    }

    public function getPendingCourses() {
        $sql = "SELECT 
                    courses.id,
                    courses.teacher_id,
                    courses.title,
                    courses.description,
                    courses.content_type,
                    courses.content_path,
                    courses.category_id,
                    courses.rating,
                    courses.approval,
                    users.email AS teacher_email
                FROM 
                    courses
                JOIN 
                    users 
                ON 
                    courses.teacher_id = users.id
                WHERE 
                    courses.approval = 'pending';
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function approveCourse($id) {
        return $this->update('courses', ['approval' => 'approved'], ['id' => $id]);
    }

    public function rejectCourse($id) {
        return $this->delete('courses', ['id' => $id]);
    }

    public function getCoursesByTeacher($teacherId) {
        $sql = "SELECT 
                    c.id,
                    c.title,
                    c.description,
                    c.content_type,
                    c.content_path,
                    c.category_id,
                    c.rating,
                    c.approval,
                    cat.name AS category_name
                FROM 
                    courses c
                LEFT JOIN 
                    categories cat ON c.category_id = cat.id
                WHERE 
                    c.teacher_id = :teacher_id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([":teacher_id" => $teacherId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCourse($id) {
        return $this->delete("courses", ["id" => $id]);
    }

    public function getCourseById($courseId) {
        $sql = "SELECT 
                    c.*, 
                    GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags
                FROM 
                    courses c
                LEFT JOIN 
                    course_tags ct ON c.id = ct.course_id
                LEFT JOIN 
                    tags t ON ct.tag_id = t.id
                WHERE 
                    c.id = :courseId
                GROUP BY 
                    c.id
        ";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':courseId' => $courseId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCourse($courseData) {
        $id = $courseData['id'];
        unset($courseData['id']);
    
        return $this->update('courses', $courseData, ['id' => $id]);
    }

    public function updateCourseTags($courseId, $tags) {
        $this->delete('course_tags', ['course_id' => $courseId]);
    
        foreach ($tags as $tagName) {
            $tagRow = $this->read('tags', ['name' => $tagName]);
    
            if (!$tagRow) {
                $this->create('tags', ['name' => $tagName]);
                $tagRow = $this->read('tags', ['name' => $tagName]);
            }
    
            if ($tagRow) {
                $tagId = $tagRow[0]['id'];
                $this->create('course_tags', [
                    'course_id' => $courseId,
                    'tag_id' => $tagId,
                ]);
            }
        }
    }

    public function getCourseDetailsById($courseId) {
        $sql = "SELECT 
                    c.id AS course_id,
                    c.title AS course_title,
                    c.description AS course_description,
                    c.content_type AS course_content_type,
                    c.content_path AS course_content_path,
                    c.rating AS course_rating,
                    cat.name AS category_name,
                    u.name AS instructor_name,
                    GROUP_CONCAT(t.name ORDER BY t.name SEPARATOR ', ') AS tags
                FROM 
                    courses c
                LEFT JOIN 
                    categories cat ON c.category_id = cat.id
                LEFT JOIN 
                    users u ON c.teacher_id = u.id
                LEFT JOIN 
                    course_tags ct ON c.id = ct.course_id
                LEFT JOIN 
                    tags t ON ct.tag_id = t.id
                WHERE 
                    c.id = :courseId
                GROUP BY 
                    c.id
        ";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':courseId' => $courseId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
}
