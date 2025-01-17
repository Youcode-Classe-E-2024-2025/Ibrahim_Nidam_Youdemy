<?php

    namespace Connection;

    use Controller\HomeController;
use Controller\statisticsController;
use Core\App;
    use CourseController\CoursesController;
    use UsersController\AdminController;
    use UsersController\StudentController;
    use UsersController\TeacherController;
    use UsersController\UserController;

    App::$router->get("/", [HomeController::class, "index"]);

    App::$router->get("/users/AdminDash", [AdminController::class, "adminDash"]);
    App::$router->get("/users/TeacherDash", [TeacherController::class, "teacherDash"]);
    App::$router->get("/users/StudentProfile", [StudentController::class, "studentProfile"]);
    App::$router->get("/coursesPage", [CoursesController::class, "courses"]);

    App::$router->get("/logout", [UserController::class, "logout"]);

    App::$router->get("/search", [CoursesController::class, "search"]);

    App::$router->get("/users/AdminDash", [statisticsController::class, "adminStats"]);
    App::$router->get("/users/TeacherDash", [statisticsController::class, "teacherStats"]);

    App::$router->post("/login", [UserController::class, "login"]);
    App::$router->post("/register-student", [UserController::class, "registerStudent"]);
    App::$router->post("/register-teacher", [UserController::class, "registerTeacher"]);