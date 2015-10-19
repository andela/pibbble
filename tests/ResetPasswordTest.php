<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ResetPasswordTest extends TestCase
{
    use DatabaseMigrations;
    protected $baseUrl = 'http://localhost';

    public function testBasicExample()
    {
        $this->visit('/password/email')
         ->type('oladipupo.isola@andela.com', 'email')
         ->press('reset')
         ->seePageIs('/password/email');
    }

    public function testBasicExample1()
    {
        $this->visit('/password/email')
             ->see('RESET');
    }

    public function testResponse()
    {
        $response = $this->call('GET', '/password/email');

        $this->assertEquals(200, $response->status());
    }
}
