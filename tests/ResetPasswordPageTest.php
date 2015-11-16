<?php

class ResetPasswordPageTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    public function testPasswordResetButton()
    {
        $this->visit('/auth/login')
             ->click('Forgot your password?')
             ->seePageIs('/password/email');
    }

    public function testResponse()
    {
        $response = $this->call('GET', '/password/email');

        $this->assertEquals(200, $response->status());
    }
}
