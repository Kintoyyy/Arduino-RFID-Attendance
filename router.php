<?php
$router = new \Bramus\Router\Router();

//handle api 404 errors
$router->set404('/api(/.*)?', function () {
    header('HTTP/1.1 404 Not Found');
    header('Content-Type: application/json');

    $jsonArray = array();
    $jsonArray['status'] = "404";
    $jsonArray['status_text'] = "route not defined";

    echo json_encode($jsonArray);
});
//handle 404 errors
$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    include "public/404.php";
});

// $loggedIn = false;

$router->before('GET|POST', '/admin/.*', function() {
    if (!$_SESSION['loggedIn'] == "true") {
        header('Location: /login');
        exit();
    }
});

$router->all(
    '/',
    function () {
        include "public/landing_page.php";
    }
);

$router->all(
    '/login',
    function () {
        include "public/auth/login.php";
    }
);

$router->get(
    '/logout',
    function () {
        include "public/auth/logout.php";
    }
);

$router->mount('/admin', function () use ($router) {

    $router->all(
        '/',
        function () {
            header('Location: /admin/home');
        }
    );

    $router->all(
        '/home',
        function () {
            include "public/dashboard/dashboard.php";
        }
    );

    $router->all(
        '/students',
        function () {
            include "public/students/students.php";
        }
    );

    $router->all(
        '/schedules',
        function () {
            include "public/schedules/schedules.php";
        }
    );

    $router->all(
        '/logs',
        function () {
            include "public/logs/logs.php";
        }
    );

    $router->all(
        '/hallpass',
        function () {
            include "public/hallpass/hallpass.php";
        }
    );

    $router->all(
        '/devices',
        function () {
            include "public/devices/devices.php";
        }
    );
});

$router->run();