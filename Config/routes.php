<?php

    namespace Connection;

    use Controller\HomeController;
    use Core\App;

    App::$router->get("/", [HomeController::class, "index"]);