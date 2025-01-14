<?php

    namespace Connection;

    use Controller\HomeController;
    use Core\App;
    use Users\AdminController;
    use Users\TeacherController;

    App::$router->get("/", [HomeController::class, "index"]);
    App::$router->get("/users/AdminDash", [AdminController::class, "adminDash"]);
    App::$router->get("/users/TeacherDash", [TeacherController::class, "teacherDash"]);