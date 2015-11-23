<?php

namespace Pibbble\Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProfileSettingsTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    use WithoutMiddleware;

    public function testResponse()
    {
        $response = $this->call('GET', '/profile/settings');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
