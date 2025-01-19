<?php

namespace AdminModel;

use Core\Model;

class CategoryModel extends Model {

    public function getAllCats(){
        return $this->read("categories");
    }

    public function addCats($name){
        $existingCats = $this->read("categories", ["name" => $name]);

        if(!empty($existingCats)){
            return false;
        }

        return $this->create("categories", ["name" => $name]);
    }

    public function updateCats($id, $name){
        $existingCats = $this->read("categories", ["name" => $name]);

        if(!empty($existingCats)){
            return false;
        }
        
        return $this->update("categories", ["name" => $name], ["id" => $id]);
    }

    public function deleteCats($id){
        return $this->delete("categories", ["id" => $id]);
    }

    public function getCatById($id) {
        return $this->read("categories", ["id" => $id]);
    }
}