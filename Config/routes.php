<?php

    namespace Connection;

    use Controller\HomeController;
    use Core\App;
    use Users\AdminController;

    App::$router->get("/", [HomeController::class, "index"]);
    App::$router->get("/users/AdminDash", [AdminController::class, "adminDash"]);