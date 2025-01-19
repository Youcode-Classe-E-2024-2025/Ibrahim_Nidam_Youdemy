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

    public function addCourse() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $this->csrfMiddleware->handle($_POST);

            $teacherId = $_SESSION['id'] ?? null;
            $title = $_POST['title'] ?? '';
            $description = $_POST['description'] ?? '';
            $contentType = $_POST['content_type'] ?? '';
            $categoryId = $_POST['category_id'] ?? '';
            $tags = $_POST['tags'] ?? [];

            $contentPath = $this->handleFileUpload($_FILES['content_path'], $contentType);
            if (!$contentPath) {
                $this->setFlash("error", "Invalid file upload.");
                return;
            }

            $courseData = [
                'teacher_id' => $teacherId,
                'title' => $title,
                'description' => $description,
                'content_type' => $contentType,
                'content_path' => $contentPath,
                'category_id' => $categoryId,
                'rating' => rand(0, 5),
                'approval' => 'pending',
            ];

            $courseId = $this->courseModel->createCourse($courseData);

            if ($courseId && !empty($tags)) {
                $this->courseModel->attachTagsToCourses($courseId, $tags);
            }

            $this->setFlash("success", "Course added successfully!");
            $this->redirect("../users/TeacherDash");
        }
    }

    private function handleFileUpload($file, $contentType) {
        $uploadDir = __DIR__ . "/../../../storage/uploads/";
        $allowedTypes = $contentType === 'video' ? ['mp4'] : ['pdf'];
        $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedTypes)) {
            $this->setFlash("error", "Make sure you uploaded the right file type.");
            $this->redirect("../users/TeacherDash");
        }

        $fileName = uniqid() . "." . $fileExtension;
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return "uploads/" . $fileName;
        }

        return false;
    }
    
}
