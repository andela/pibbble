<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamsTest extends TestCase
{
    use DatabaseMigrations;

    protected $baseUrl = 'http://localhost';

    /**
     * Test for viewing teams page
     *
     * @return void
     */
    public function testViewTeams()
    {
        $this->visit('/teams')
            ->see('All Teams');
    }

    public function testCreateTeamsWithoutAuth()
    {
        //$user = factory(Pibbble\User::class)->create();
        $this->visit('teams/new')
            ->seePageIs('/auth/login');
    }
}
