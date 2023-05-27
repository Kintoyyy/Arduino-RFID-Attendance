<?php
$router = new \Bramus\Router\Router();
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// handle api 404 errors
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


$router->before('GET|POST', '/admin/.*', function () {
    if (!$_SESSION['loggedIn'] == "true") {
        header('Location: /login');
        exit();
    }
});

$router->before('GET|POST', '/api/.*', function () use ($pdo) {
    $api_key = $_GET['api_key'];
    $stmt = $pdo->prepare("SELECT * FROM device_data WHERE device_api_key = :device_api_key");
    $stmt->execute([':device_api_key' => $api_key]);
    if ($stmt->rowCount() == 0) {
        die(json_encode([
            'api_status' => 'api_error',
            'api_event' => 'invalid_key',
            'api_message' => 'invalid api key',
        ]));
    }
});


$router->mount('/api', function () use ($router, $pdo) {
    $router->mount(
        '/devices',
        function () use ($router, $pdo) {

            $router->all(
                '/send_card',
                function () use ($pdo) {
                        include "public\api\card_attendance.php";
                        // if ($register['device_mode'] == 0) {
            
                        // } else {
            
                        // }
            
                    }
            );

            $router->all(
                '/check_card',
                function () use ($pdo) {
                        include "public\api\card_attendance.php";
                    }
            );

            $router->all(
                '/hallpass',
                function () use ($pdo) {
                        include "public\api\device_hallpass.php";
                    }
            );
        }
    );
});


$router->mount('/admin', function () use ($router, $pdo) {

    $router->all(
        '/',
        function () {
            header('Location: /admin/home');
        }
    );

    $router->all(
        '/home',
        function () use ($pdo) {
            include "public/dashboard/dashboard.php";
        }
    );

    $router->all(
        '/sections',
        function () use ($pdo) {
            include "public/students/sections.php";
        }
    );

    $router->all(
        '/students',
        function () use ($pdo) {
            include "public/students/students.php";
        }
    );

    $router->all(
        '/schedules',
        function () use ($pdo) {
            include "public/schedules/schedules.php";
        }
    );

    $router->all(
        '/logs',
        function () use ($pdo) {
            include "public/logs/logs.php";
        }
    );

    $router->all(
        '/hallpass',
        function () use ($pdo) {
            include "public/hallpass/hallpass.php";
        }
    );

    $router->all(
        '/devices',
        function () use ($pdo) {
            include "public/devices/devices.php";
        }
    );
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

$router->run();