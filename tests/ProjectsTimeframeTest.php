<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectsTimeframeTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    /**
     * Test if timeframe links work.
     *
     * @return void
     */
    public function testTimeframeLoad()
    {
        $response = $this->call('GET', '/timeframe?time=pastYear');
        $this->assertResponseOk();
    }
}
