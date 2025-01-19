<?php

namespace CourseModel;

class Course {
    protected $id;
    protected $teacherId;
    protected $title;
    protected $description;
    protected $contentType;
    protected $contentPath;
    protected $categoryId;
    protected $tags = [];

    public function __construct($id, $teacherId, $title, $description, $contentPath, $contentType, $categoryId, $tags = []){
        $this->id = $id;
        $this->teacherId = $teacherId;
        $this->title = $title;
        $this->description = $description;
        $this->contentPath = $contentPath;
        $this->contentType = $contentType;
        $this->categoryId = $categoryId;
        $this->tags = $tags;
    }

    public function display(){}

    public function add(CourseModel $courseModel){
        $courseData = [
            "teacher_id" => $this->teacherId,
            "title" => $this->title,
            "description" => $this->description,
            "content_type" => $this->contentType,
            "content_path" => $this->contentPath,
            "category_id" => $this->categoryId
        ];

        $courseId = $courseModel->createCourse($courseData);

        if(!empty($this->tags)){
            $courseModel->attachTagsToCourses($courseId, $this->tags);
        }

        $this->id = $courseId;

        return $courseId;
    }

}