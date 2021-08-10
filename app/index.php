<?php
require_once 'router.php';
require_once 'settings.php';
require __DIR__ . '/vendor/autoload.php';

route('/', function () {
    view('views/login_page.php');
});

route('/login', function ($query = null) use ($settings) {
    $dbService = new App\Services\DatabaseService($settings['db']);
    $loginController = new App\Controllers\LoginController($dbService);
    return $loginController->login($query);
});

route('/404', function ($query = null) {
    return "Sorry, the specified page could not be found!";
});

$action = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
dispatch($action, $query);
