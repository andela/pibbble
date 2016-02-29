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
        $this->visit('teams/new')
            ->seePageIs('/auth/login');
    }

    public function testCreateTeams()
    {
        $user = factory(Pibbble\User::class)->create();
        $this->actingAs($user)
            ->visit('teams/new')
            ->type('Dream Team', 'name')
    }
}
