<?php

namespace AdminModel;

use Core\Model;

class CategoryModel extends Model {

    public function getAllCats(){
        return $this->read("categories");
    }

    public function addCats($name){
        return $this->create("categories", ["name" => $name]);
    }

    public function updateCats($id, $name){
        return $this->update("categories", ["name" => $name], ["id" => $id]);
    }

    public function deleteCats($id){
        return $this->delete("categories", ["id" => $id]);
    }
}