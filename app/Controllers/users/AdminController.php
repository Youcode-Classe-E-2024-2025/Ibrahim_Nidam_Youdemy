<?php

namespace Users;


class AdminController extends UserController {

    public function adminDash() {
        $this->showView("users/AdminDash");
    }
}