<?php

class UserAuthenticationTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    public function testUserAuthentication()
    {
        factory(Pibbble\User::class)->create([
            'email' => 'ope@yahoo.com',
            'password' => bcrypt('123456'),
            'username' => 'solami',
        ]);

        $this->visit('/auth/login')
            ->type('ope@yahoo.com', 'email')
            ->type('123456', 'password')
            ->check('rememberMe')
            ->press('login')
            ->seePageIs('/')
            ->see('solami');
    }
}
