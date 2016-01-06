<?php

class OAuthTest extends TestCase
{
    protected $baseUrl = 'https://pibbble-staging.herokuapp.com';

    public function testGitHubOAuth()
    {
        $response = $this->call('GET', '/auth/github');

        $this->assertEquals(302, $response->getStatusCode());

        $this->assertTrue(str_contains($response->headers->__toString(), 'https://github.com/'));
    }

    public function testTwitterOAuth()
    {
        Session::start(); // Start a session for the current test
        $params = [
            '_token' => csrf_token(), // Retrieve current csrf token
        ];

        $response = $this->call('GET', '/auth/twitter', $params);

        $this->assertEquals(302, $response->getStatusCode());

        $this->assertTrue(str_contains($response->headers->__toString(), 'twitter.com'));
    }
}
