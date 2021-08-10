<?php
namespace App\Services;

use PDO;
use PDOException;

class DatabaseService
{
    public function __construct(array $settings)
    {
        try {
            $pdo = new PDO('mysql:host=' . $settings['host'] .
                ';port=' . $settings['port'] .
                ';dbname=' . $settings['dbname'],
                $settings['user'],
                $settings['pass']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }

    public function loggedIn(string $username, string $password)
    {
        return true;
    }
}
