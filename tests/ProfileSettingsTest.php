<?php

use Illuminate\Foundation\Testing\CrawlerTrait;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ProfileSettingsTest extends TestCase
{
    protected $baseUrl = 'http://pibbble.dev';

    use WithoutMiddleware;

    public function tes_Response()
    {
        $response = $this->call('GET', '/profile/settings');

        $this->assertEquals(200, $response->getStatusCode());
    }
}
