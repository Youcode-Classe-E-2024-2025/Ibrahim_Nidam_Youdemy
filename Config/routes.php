<?php

    namespace Connection;

    use Core\App;

    App::$router->handleError(404);
    App::$router->handleError(403);