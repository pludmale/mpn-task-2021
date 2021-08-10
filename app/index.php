<?php
require_once "router.php";

route('/', function () {
    return "Hello World";
});
route('/login', function ($query = null) {
    $loginController = new App\Controllers\LoginController();
    return $loginController->login();
});
route('/404', function ($query = null) {
    return "Sorry, the specified page could not be found!";
});

$action = $_SERVER['REQUEST_URI'];
$query = $_SERVER['QUERY_STRING'];
dispatch($action, $query);
