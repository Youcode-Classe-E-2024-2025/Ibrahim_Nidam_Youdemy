<?php

namespace UsersController;

class AdminController extends UserController {

    public function adminDash() {
        $this->showView("users/AdminDash");
    }
}