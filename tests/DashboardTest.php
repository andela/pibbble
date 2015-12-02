<?php

use Pibbble\Project;
class DashboardTest extends TestCase
{
    protected $baseUrl = 'http://localhost:8000';

    /**
     * A test for the index page.
     *
     * @return void
     */
    public function testDashboardPage()
    {
        $response = $this->call('GET', '/projects');

        $this->assertEquals(302, $response->getStatusCode());
    }

    public function testDelete()
    {
        $this->post('/projects/11');
        $project = Project::find(11);
        $this->missingFromDatabase('projects', ['id' => 11]);

    }

}
