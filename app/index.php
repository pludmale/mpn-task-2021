<?php
require_once "router.php";

use App\Controllers\LoginController;

route('/', function () {
    return "Hello World";
});
route('/login', function () {
    $loginController = new LoginController();
    return $loginController->login();
});
route('/404', function () {
    return "Sorry, the specified page could not be found!";
});

$action = $_SERVER['REQUEST_URI'];
dispatch($action);
