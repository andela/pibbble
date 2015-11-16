<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class OAuthTest extends TestCase
{
    use DatabaseMigrations;

    protected $baseUrl = 'http://localhost';

    public function testGitHubOAuth()
    {

        $response = $this->call('GET', '/auth/github');

        $this->assertEquals(302, $response->getStatusCode());

        $this->assertTrue(str_contains($response->headers->__toString(), 'https://github.com/'));
    }

    public function testTwitterOAuth()
    {

        $response = $this->call('GET', '/auth/twitter');

        $this->assertEquals(302, $response->getStatusCode());

        $this->assertTrue(str_contains($response->headers->__toString(), 'twitter.com'));
    }
}
