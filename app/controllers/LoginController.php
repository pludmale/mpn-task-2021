<?php
namespace App\Controllers;

class LoginController
{
    public function login($query = null)
    {
        if ($query === null) {
            return 'No login information provided!';
        }
        return 'Logged in!';
    }
}
