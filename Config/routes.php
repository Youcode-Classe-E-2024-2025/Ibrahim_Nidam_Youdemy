<?php

    namespace Connection;

    use Controller\CoursesController;
    use Controller\HomeController;
    use Core\App;
    use Users\AdminController;
    use Users\StudentController;
    use Users\TeacherController;

    App::$router->get("/", [HomeController::class, "index"]);
    App::$router->get("/users/AdminDash", [AdminController::class, "adminDash"]);
    App::$router->get("/users/TeacherDash", [TeacherController::class, "teacherDash"]);
    App::$router->get("/users/StudentProfile", [StudentController::class, "studentProfile"]);
    App::$router->get("/coursesPage", [CoursesController::class, "courses"]);