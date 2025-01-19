<?php

namespace UsersController;

class AdminController extends UserController {

    public function adminDash() {
        $editingCategory = null;
        $editingTag = null;

        $allUsers = $this->userModel->getAllUsers();

        $groupedUsers = [
            'admin' => array_filter($allUsers, fn($user) => $user['role'] === 'admin'),
            'teacher' => array_filter($allUsers, fn($user) => $user['role'] === 'teacher'),
            'student' => array_filter($allUsers, fn($user) => $user['role'] === 'student'),
        ];

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

        // Prepare data for the view
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
            "pendingTeachers" => $this->teacherModel->getPendingTeachers(),
            "pendingCourses" => $this->courseModel->getPendingCourses(),
            "groupedUsers" => $groupedUsers,
        ];

        // Render the admin dashboard view
        $this->showView("users/AdminDash", $data);
    }

    public function handleActions() {
        $csrfToken = $_POST['csrf_token'] ?? '';
        if (!$this->security->verifyCsrfToken($csrfToken)) {
            $this->setFlash("error", "Invalid CSRF token.");
            $this->redirect("../users/AdminDash");
        }

        $action = $_POST['action'] ?? '';
        $id = $_POST['id'] ?? '';

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
                if ($this->categories->deleteCats($id)) {
                    $this->setFlash("success", "Category deleted successfully!");
                } else {
                    $this->setFlash("error", "Failed to delete category.");
                }
                break;

            case 'add_tag':
                $tags = explode(',', $_POST['tags'] ?? '');
                $tags = array_map('trim', $tags);
                if (!$this->tags->addTags($tags)) {
                    $this->setFlash("success", "Tags added successfully!");
                } else {
                    $this->setFlash("error", "Failed to add tags.");
                }
                break;

            case 'delete_tag':
                if ($this->tags->deleteTag($id)) {
                    $this->setFlash("success", "Tag deleted successfully!");
                } else {
                    $this->setFlash("error", "Failed to delete tag.");
                }
                break;

            case 'update_category':
                $name = $_POST['name'] ?? '';
                if (!$this->categories->updateCats($id, $name)) {
                    $this->setFlash("success", "Category updated successfully!");
                } else {
                    $this->setFlash("error", "Failed to update category.");
                }
                break;

            case 'update_tag':
                $name = $_POST['name'] ?? '';
                if (!$this->tags->updateTag($id, $name)) {
                    $this->setFlash("success", "Tag updated successfully!");
                } else {
                    $this->setFlash("error", "Failed to update tag.");
                }
                break;

            case 'approve_teacher':
                if (!$this->teacherModel->approveTeacher($id)) {
                    $this->setFlash("success", "Teacher approved successfully!");
                } else {
                    $this->setFlash("error", "Failed to approve teacher.");
                }
                break;

            case 'reject_teacher':
                if ($this->teacherModel->rejectTeacher($id)) {
                    $this->setFlash("success", "Teacher rejected successfully!");
                } else {
                    $this->setFlash("error", "Failed to reject teacher.");
                }
                break;

            case 'approve_course':
                if (!$this->courseModel->approveCourse($id)) {
                    $this->setFlash("success", "Course approved successfully!");
                } else {
                    $this->setFlash("error", "Failed to approve course.");
                }
                break;

            case 'reject_course':
                if ($this->courseModel->rejectCourse($id)) {
                    $this->setFlash("success", "Course rejected successfully!");
                } else {
                    $this->setFlash("error", "Failed to reject course.");
                }
                break;
            case 'suspend_user':
                if (!$this->userModel->suspendUser($id)) {
                    $this->setFlash("success", "User suspended successfully!");
                } else {
                    $this->setFlash("error", "Failed to suspend user.");
                }
                break;

            case 'activate_user':
                if (!$this->userModel->activateUser($id)) {
                    $this->setFlash("success", "User activated successfully!");
                } else {
                    $this->setFlash("error", "Failed to activate user.");
                }
                break;

            case 'delete_user':
                if ($this->userModel->deleteUser($id)) {
                    $this->setFlash("success", "User deleted successfully!");
                } else {
                    $this->setFlash("error", "Failed to delete user.");
                }
                break;

            default:
                $this->setFlash("error", "Invalid action.");
        }

        $this->redirect("../users/AdminDash");
    }
}
