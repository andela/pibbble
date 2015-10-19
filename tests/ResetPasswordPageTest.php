<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ResetPasswordPageTest extends TestCase
{
    use DatabaseMigrations;

    protected $baseUrl = 'http://localhost';

    public function testPasswordResetButton()
    {
        $this->visit('/password/email')
              ->type('oladipupo.isola@andela.com', 'email')
              ->press('reset')
              ->seePageIs('/password/email');
    }

    public function testResponse()
    {
        $response = $this->call('GET', '/password/email');

        $this->assertEquals(200, $response->status());
    }
}
