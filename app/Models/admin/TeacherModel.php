<?php

namespace AdminModel;

use Core\Model;

class TeacherModel extends Model {
    public function getPendingTeachers() {
        return $this->read('users', ['role' => 'pending_teacher']);
    }

    public function approveTeacher($id) {
        return $this->update('users', ['role' => 'teacher'], ['id' => $id]);
    }

    public function rejectTeacher($id) {
        return $this->delete('users', ['id' => $id]);
    }
}