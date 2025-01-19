<?php

namespace UsersController;

use AdminModel\CategoryModel;

class AdminController extends UserController {

    public function adminDash() {

        $editingCategory = null;
        $editingTag = null;
    
        if (isset($_GET['action']) && $_GET['action'] === 'edit_category') {
            $id = $_GET['id'] ?? null;
            if ($id) {
                $editingCategory = $this->categories->getCatById($id);
            }
        }
        if (isset($_GET['action']) && $_GET['action'] === 'edit_tag') {
            $id = $_GET['id'] ?? null;
            if ($id) {
                $editingTag = $this->tags->getTagById($id);
            }
        }

        $data = [
            "categories" => $this->categories->getAllCats(),
            "tags" => $this->tags->getAllTags(),
            "total_courses" => $this->stats->getTotalCourses(),
            "editingCategory" => $editingCategory,
            'editingTag' => $editingTag,
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
            case 'update_category':
                $id   = $_POST['id'] ?? '';
                $name = $_POST['name'] ?? '';
                if ($this->categories->updateCats($id, $name)) {
                    $this->setFlash("success", "Category updated successfully!");
                } else {
                    // $this->setFlash("error", "Failed to update category.");
                }
                break;
            case 'update_tag':
                $id   = $_POST['id'] ?? '';
                $name = $_POST['name'] ?? '';
                if ($this->tags->updateTag($id, $name)) {
                    $this->setFlash("success", "Tag updated successfully!");
                } else {
                    // $this->setFlash("error", "Failed to update tag.");
                }
                break;
                

            default:
                $this->setFlash("error", "Invalid action.");
        }

        $this->redirect("../users/AdminDash");
    }
}
