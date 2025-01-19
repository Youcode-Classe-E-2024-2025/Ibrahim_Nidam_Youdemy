<?php

namespace CourseController;

use Core\Controller;
use CourseModel\DocumentCourse;
use CourseModel\VideoCourse;
use Middleware\CsrfMiddleware;

class CoursesController extends Controller {
    private $csrfMiddleware;

    public function __construct(){
        parent::__construct();
        $this->csrfMiddleware = new CsrfMiddleware();
    }

    public function courses() {
        $currentPage = isset($_GET["page"]) ? (int)$_GET["page"] : 1;
        $itemsPerPage = 12;
        if ($this->courseModel === null) {
            die('CourseModel is not instantiated.');
        }

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
        $o = isset($_GET['o']) ? $_GET['o'] : null;
    
        if (empty($keyword)) {
            $this->showView("coursesPage", [
                "courses" => [],
                "keyword" => $keyword,
                "currentPage" => 1,
                "totalPages" => 1,
                "oParam" => $o
            ]);
            return;
        }
    
        $courses = $this->courseModel->searchCourses($keyword);
    
        $this->showView("coursesPage", [
            "courses" => $courses,
            "keyword" => $keyword,
            "currentPage" => 1,
            "totalPages" => 1,
            "oParam" => $o
        ]);
    }

    public function addCourse(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $this->csrfMiddleware->handle($_POST);

            $teacherId = $_SESSION["id"] ?? "";
            $title = $_POST["title"] ?? "";
            $description = $_POST["description"] ?? "";
            $contentType = $_POST["content_type"] ?? "";
            $contentPath = $_POST["content_path"] ?? "";
            $categoryId = $_POST["category_id"] ?? "";
            $tags = isset($_POST["tags"]) ? explode(",", $_POST["tags"]) : [];

            

        }
        $this->showView("coursesPage");
    }
    
}
