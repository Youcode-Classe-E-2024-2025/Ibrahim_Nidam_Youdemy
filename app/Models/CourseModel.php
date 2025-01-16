<?php

namespace Model;

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
}
