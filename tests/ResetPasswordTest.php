<?php

use Illuminate\Support\Facades\Facade;

class ResetPasswordTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->password = Mockery::mock('Illuminate\Auth\Reminders\PasswordBroker');

        Facade::setFacadeApplication([
            'password.remind' => $this->password
        ]);
    }
    protected function tearDown()
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
