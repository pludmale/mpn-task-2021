<?php
namespace Tests;

use App\Controllers\LoginController;
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

        $this->controller = new LoginController();
    }

    public function testLoginReturnsSuccess()
    {
        $this->assertEquals('Logged in!', $this->controller->login());
    }
}
