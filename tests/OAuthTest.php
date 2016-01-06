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
        $response = $this->call('GET', '/auth/twitter');
        var_dump($response);

        $this->assertEquals(302, $response->getStatusCode());

        $this->assertTrue(str_contains($response->headers->__toString(), 'twitter.com'));
    }
}
