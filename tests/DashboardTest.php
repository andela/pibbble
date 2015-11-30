<?php

class DashboardTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    /**
     * A test for the index page.
     *
     * @return void
     */
    public function testDashboardPage()
    {
        $response = $this->call('get', '/projects');

        $this->assertEquals(302, $response->getStatusCode());
    }
}
