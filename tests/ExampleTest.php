<?php

class ExampleTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $response = $this->call('GET', '/auth/login');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
