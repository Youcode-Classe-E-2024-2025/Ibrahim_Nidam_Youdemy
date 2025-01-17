<?php

namespace AdminModel;

use Core\Model;

class TagsModel extends Model {

    public function getAllTags(){
        return $this->read("tags");
    }

    public function addTag($name){
        $existingTag = $this->read("tags", ["name" => $name]);

        if(!empty($existingTag)){
            return false;
        }

        return $this->create("tags", ["name" => $name]);
    }

    public function addTags($tags){
        $data = [];

        foreach($tags as $tag){
            $existingTag = $this->read("tags", ["name" => $tag]);
            if(empty($existingTag)){
                $data[] = ["name" => $tag];
            }
        }
        if(!empty($data)){
            return $this->create("tags", $data);
        }

        return false;
    }

    public function updateTag($id, $name){
        $existingTag = $this->read("tags", ["name" => $name]);

        if(!empty($existingTag)){
            return false;
        }
        
        return $this->update("tags", ["name" => $name], ["id" => $id]);
    }

    public function deleteTag($id){
        return $this->delete("tags", ["id" => $id]);
    }
}