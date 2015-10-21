<?php

use Illuminate\Support\Facades\Facade;
use Pibbble\Http\Requests\Request;
use Pibbble\Http\Controllers\Auth\PasswordController;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ResetPasswordTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    public function setUp()
    {
        $this->password = Mockery::mock('Illuminate\Auth\Reminders\PasswordBroker');

        Facade::setFacadeApplication([
            'password.remind' => $this->password
        ]);
    }

    public function tearDown()
    {
        Mockery::close();
        Facade::setFacadeApplication(null);
        Facade::clearResolvedInstances();
    }

    public function test_it_sends_password_reset_confirmation_email()
    {

        // Testing for Password::sendResetLink()
        $response = Mockery::mock();
        $this-> password -> shouldReceive('sendResetLink')
             -> with(Mockery::on(function () {
                return true;
            }))
             -> andReturn($response);
    }
}
