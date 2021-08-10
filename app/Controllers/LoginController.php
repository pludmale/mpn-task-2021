<?php
namespace App\Controllers;

use App\Services\DatabaseService;
use PDO;

class LoginController
{
    /**
     * @var DatabaseService
     */
    private $dbService;

    public function __construct(DatabaseService $dbService)
    {
        $this->dbService = $dbService;
    }

    public function login($query = null)
    {
        if (empty($query)) {
            return 'No login information provided!';
        }

        if ($this->dbService->loggedIn($query['username'], $query['password'])) {
            return 'Logged in!';
        } else {
            return 'Login unsuccessful!';
        }
    }
}
