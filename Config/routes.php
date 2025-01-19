<?php

namespace Connection;

use Controller\HomeController;
use Core\App;
use CourseController\CoursesController;
use UsersController\AdminController;
use UsersController\StudentController;
use UsersController\TeacherController;
use UsersController\UserController;

// Home Page
App::$router->get("/", [HomeController::class, "index"]);

// User Dashboards
App::$router->get("/users/AdminDash", [AdminController::class, "adminDash"]);
App::$router->post("/users/AdminDash", [AdminController::class, "handleActions"]);
App::$router->get("/users/TeacherDash", [TeacherController::class, "teacherDash"]);
App::$router->post("/users/TeacherDash/delete", [TeacherController::class, "handleActions"]);
App::$router->get("/users/StudentProfile", [StudentController::class, "studentProfile"]);

// Courses
App::$router->get("/coursesPage", [CoursesController::class, "courses"]);
App::$router->get("/search", [CoursesController::class, "search"]);
App::$router->post("/users/TeacherDash", [CoursesController::class, "addCourse"]);
App::$router->post("/users/TeacherDash/update-course", [CoursesController::class, "updateCourse"]);

// Authentication
App::$router->post("/login", [UserController::class, "login"]);
App::$router->post("/register-student", [UserController::class, "registerStudent"]);
App::$router->post("/register-teacher", [UserController::class, "registerTeacher"]);
App::$router->get("/logout", [UserController::class, "logout"]);
