<?php
require_once "router.php";

route('/', function () { return "Hello World";});
route('/about', function () { return "Hello from the about route!";});
route('/404', function () { return "Sorry, the specified page could not be found!"; });

$action = $_SERVER['REQUEST_URI'];
dispatch($action);
