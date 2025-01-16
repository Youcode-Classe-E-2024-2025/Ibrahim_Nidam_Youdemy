<?php

    namespace Connection;

    use Controller\HomeController;
    use Controller\CoursesController;
    use Core\App;
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

    App::$router->post("/login", [UserController::class, "login"]);
    App::$router->post("/register-student", [UserController::class, "registerStudent"]);
    App::$router->post("/register-teacher", [UserController::class, "registerTeacher"]);

