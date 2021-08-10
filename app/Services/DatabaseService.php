<?php
namespace App\Services;

use PDO;
use PDOException;

class DatabaseService
{
    /**
     * @var PDO
     */
    private $dbConnection;

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

            $this->dbConnection = $pdo;
        } catch (PDOException $e) {
            echo($e->getMessage());
        }
    }

    public function loggedIn(string $username, string $password)
    {
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $statement = $this->dbConnection
            ->prepare("SELECT username, password FROM users WHERE username=? AND password=?;");
        $statement->execute([$username, $passwordHash]);

        if (empty($statement->fetchAll())) {
            return false;
        }

        return true;
    }
}
