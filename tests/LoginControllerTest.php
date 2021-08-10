<?php
namespace Tests;

use App\Controllers\LoginController;
use App\Services\DatabaseService;
use PHPUnit\Framework\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * @var LoginController
     */
    private $controller;

    public function setUp(): void
    {
        parent::setUp();

        $databaseService = new DatabaseService([
            'host' => 'localhost',
            'port' => 3306,
            'user' => 'root',
            'pass' => '',
            'dbname' => 'test_foo',
        ]);

        $this->controller = new LoginController($databaseService);
    }

    public function testLoginReturnsSuccess()
    {
        $query = [
            'username' => 'borscht',
            'password' => 'wxc4e598pn9npxk22'
        ];
        $this->assertEquals('Logged in!', $this->controller->login($query));
    }

    public function testLoginReturnsErrorMsgWhenNoQueryProvided()
    {
        $this->assertEquals('No login information provided!', $this->controller->login());
    }
}
