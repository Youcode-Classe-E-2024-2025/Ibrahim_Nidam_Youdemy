<?php

namespace Controller;

use Core\Controller;

class CoursesController extends Controller {

    public function courses() {
        $currentPage = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $itemsPerPage = 12;

        $totalCourses = $this->courseModel->getTotalCourses();
        $totalPages = ceil($totalCourses / $itemsPerPage);
        $offset = ($currentPage - 1) * $itemsPerPage;

        $courses = $this->courseModel->getCourses($itemsPerPage, $offset);

        $this->showView("coursesPage", [
            "courses" => $courses,
            "currentPage" => $currentPage,
            "totalPages" => $totalPages
        ]);
    }

    public function search() {
        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    
        if (empty($keyword)) {
            $this->showView("coursesPage", [
                "courses" => [],
                "keyword" => $keyword,
                "currentPage" => 1,
                "totalPages" => 1
            ]);
            return;
        }
    
        $courses = $this->courseModel->searchCourses($keyword);
    
        $this->showView("coursesPage", [
            "courses" => $courses,
            "keyword" => $keyword,
            "currentPage" => 1,
            "totalPages" => 1
        ]);
    }
    
}
