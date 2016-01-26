<?php

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

    /**
     * Test if timeframe links work with pagination.
     *
     * @return void
     */
    public function testTimeframeLoadWithPagination()
    {
        $response = $this->call('GET', '/timeframe?time=pastYear&page=2');
        $this->assertResponseOk();
    }
}
