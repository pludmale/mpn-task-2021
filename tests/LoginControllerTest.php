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
        $query = [
            'username' => 'borscht',
            'psw' => 'wxc4e598pn9npxk22'
        ];
        $this->assertEquals('Logged in!', $this->controller->login($query));
    }

    public function testLoginReturnsErrorMsgWhenNoQueryProvided()
    {
        $this->assertEquals('No login information provided!', $this->controller->login());
    }
}
