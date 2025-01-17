<?php

namespace AdminController;

use Core\Controller;

class TagsController extends Controller {

    public function index(){
        $data = [
            "tags" => $this->tagsModel->getAllTags(),
            "csrf_token" => $this->security->generateCsrfToken()
        ];

        $this->showView("users/AdminDash", $data);
    }

    public function add(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = $_POST["name"] ?? "";

            if ($this->tagsModel->addTag($name)) {
                $this->setFlash("success", "Tag added successfully!");
            } else {
                $this->setFlash("error", "Tag already exists!");
            }

            $this->redirect("users/AdminDash");
        }
    }

    public function addTags(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $tags = explode(",", $_POST["tags"] ?? "");
            $tags = array_map("trim", $tags);

            if ($this->tagsModel->addTags($tags)) {
                $this->setFlash("success", "Tags added successfully!");
            } else {
                $this->setFlash("error", "No new tags were added (duplicates skipped).");
            }

            $this->redirect("users/AdminDash");
        }
    }

    public function update($id){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            $name = $_POST["name"] ?? "";

            if ($this->tagsModel->updateTag($id, $name)) {
                $this->setFlash("success", "Tag updated successfully!");
            } else {
                $this->setFlash("error", "Tag with the same name already exists!");
            }

            $this->redirect("users/AdminDash");
        }
    }

    public function delete($id){
        if($_SERVER["REQUEST_METHOD"] === "POST"){

            if ($this->tagsModel->deleteTag($id)) {
                $this->setFlash("success", "Tag deleted successfully!");
            } else {
                $this->setFlash("error", "Failed to delete tag.");
            }

            $this->redirect("users/AdminDash");
        }
    }
}