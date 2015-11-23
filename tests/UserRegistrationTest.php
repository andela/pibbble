<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

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
            ->seePageIs('/auth/confirmemail');
    }

    public function testRegistrationAfterEmailValidation()
    {
        $this->withSession(['_token' => '23eftyhsjeu7yfbhfijsuyhfuushbnu826h',
                            'username' => 'opeyemiab',
                            'email' => 'ope@yahoo.com',
                            'password' => bcrypt('123456'),
                            ])
            ->visit('/?_token=23eftyhsjeu7yfbhfijsuyhfuushbnu826h')
            ->see('opeyemiab');
    }
}
