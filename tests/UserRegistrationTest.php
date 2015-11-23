<?php

class UserRegistrationTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    public function testNewUserRegistration()
    {
        $this->visit('/auth/register')
            ->type('opeyemiab', 'username')
            ->type('ope@yahoo.com', 'email')
            ->type('123456', 'password')
            ->type('123456', 'password_confirmation')
            ->press('Sign Up')
            ->seePageIs('/');
    }
}
