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
            ->press('submit')
            ->see('Check your mail box to confirm your email address.');
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
