<?php

use Pibbble\Http\Requests\Request;
use Pibbble\Http\Controllers\Auth\PasswordController;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResetPasswordPageTest extends TestCase
{
    use DatabaseMigrations;

    protected $baseUrl = 'http://localhost';

    public function testPasswordResetButton()
    {
        $this->visit('/login')
             ->click("Forgot your password?")
             ->seePageIs('/password/email');
    }

    public function testResponse()
    {
        $response = $this->call('GET', '/password/email');

        $this->assertEquals(200, $response->status());
    }
}
