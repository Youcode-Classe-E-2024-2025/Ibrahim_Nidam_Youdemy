<?php

namespace UsersController;

class AdminController extends UserController {

    public function adminDash() {
        $data = [
            "categories" => $this->categories->getAllCats(),
            "tags" => $this->tags->getAllTags(),
            "total_courses" => $this->stats->getTotalCourses(),
            "courses_by_category" => $this->stats->getCoursesByCategory(),
            "course_with_most_students" => $this->stats->getCourseWithMostStudents(),
            "top_teachers" => $this->stats->getTopTeachers(),
            "csrf_token" => $this->security->generateCsrfToken(),
        ];

        $this->showView("users/AdminDash", $data);
    }

    public function handleActions() {
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!$this->security->verifyCsrfToken($csrfToken)) {
            $this->setFlash("error", "Invalid CSRF token.");
            $this->redirect("../users/AdminDash");
        }

        $action = $_POST['action'] ?? '';
        switch ($action) {
            case 'add_category':
                $name = $_POST['name'] ?? '';
                if ($this->categories->addCats($name)) {
                    $this->setFlash("success", "Category added successfully!");
                } else {
                    $this->setFlash("error", "Failed to add category.");
                }
                break;

            case 'delete_category':
                $id = $_POST['id'] ?? '';
                if ($this->categories->deleteCats($id)) {
                    $this->setFlash("success", "Category deleted successfully!");
                } else {
                    $this->setFlash("error", "Failed to delete category.");
                }
                break;

            case 'add_tag':
                $tags = explode(',', $_POST['tags'] ?? '');
                $tags = array_map('trim', $tags);
                if ($this->tags->addTags($tags)) {
                    $this->setFlash("success", "Tags added successfully!");
                } else {
                    // $this->setFlash("error", "Failed to add tags.");
                }
                break;

            case 'delete_tag':
                $id = $_POST['id'] ?? '';
                if ($this->tags->deleteTag($id)) {
                    $this->setFlash("success", "Tag deleted successfully!");
                } else {
                    $this->setFlash("error", "Failed to delete tag.");
                }
                break;

            default:
                $this->setFlash("error", "Invalid action.");
        }

        $this->redirect("../users/AdminDash");
    }
}
