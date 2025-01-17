<?php

namespace AdminController;

use Core\Controller;

class CategoryController extends Controller {

    public function index(){
        $data = [
            "categories" => $this->categoryModel->getAllCats(),
            "csrf_token" => $this->security->generateCsrfToken()
        ];

        $this->showView("users/AdminDash", $data);
    }

    public function add(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = $_POST["name"] ?? "";

            if($this->categoryModel->addCats($name)){
                $this->setFlash("success", "Category added successfully!");
            } else {
                $this->setFlash("error", "Category already exists!");
            }

            $this->redirect("users/AdminDash");
        }
    }

    public function update($id){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = $_POST["name"] ?? "";

            if ($this->categoryModel->updateCats($id, $name)) {
                $this->setFlash("success", "Category updated successfully!");
            } else {
                $this->setFlash("error", "Category with the same name already exists!");
            }

            $this->redirect("users/AdminDash");
        }
    }

    public function delete($id){
        if($_SERVER["REQUEST_METHOD"] === "GET"){
            if ($this->categoryModel->deleteCats($id)) {
                $this->setFlash("success", "Category deleted successfully!");
            } else {
                $this->setFlash("error", "Failed to delete category.");
            }

            $this->redirect("/admin/categories");
        }
    }
}