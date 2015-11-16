<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserRegistrationTest extends TestCase
{
    use DatabaseMigrations;

    protected $baseUrl = 'http://localhost';

    public function testNewUserRegistration()
    {
        $this->visit('/auth/register')
            ->type('opeyemiab', 'username')
            ->type('ope@yahoo.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('register')
            ->seePageIs('/');
    }
}
