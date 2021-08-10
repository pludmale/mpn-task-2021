<?php
/**
 * Holds the registered routes
 *
 * @var array $routes
 */
$routes = [];

/**
 * Register a new route
 *
 * @param $action string
 * @param Closure $callback Called when current URL matches provided action
 */
function route($action, Closure $callback)
{
    global $routes;
    $action = trim($action, '/');
    $routes[$action] = $callback;
}

/**
 * Display view file contents
 * @param $file string View file path
 */
function view($file)
{
    echo file_get_contents($file);
}

/**
 * Dispatch the router
 *
 * @param $action string
 * @param $query string Query string of the request
 */
function dispatch($action, $query = null)
{
    global $routes;
    $action = trim($action, '/');
    if (!array_key_exists($action, $routes)) {
        $action = '404';
    }
    $callback = $routes[$action];

    $parsedQueryString = [];
    if ($query !== null) {
        parse_str($query, $parsedQueryString);
    }
    echo call_user_func($callback, $parsedQueryString);
}

