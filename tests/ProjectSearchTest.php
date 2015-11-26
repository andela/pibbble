<?php

class ProjectsSearchTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    public function testSearchFunctionality()
    {
        $this->visit('/')
             ->type('tests', 'searchinput')
             ->press('Go')
             ->see('SEARCH RESULTS');
    }

    public function testNonExistentProject()
    {
        $this->visit('/')
             ->type('qkqr', 'searchinput')
             ->press('Go')
             ->see('No results found for your query.');
    }
}
