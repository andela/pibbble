<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;

class TeamsTest extends TestCase
{
    use DatabaseMigrations;

    protected $baseUrl = 'http://localhost';

    /**
     * Test for viewing teams page.
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
            ->type('ganga.chris@gmail.com', 'email')
            ->select('Basic', 'options')
            ->press('Create team')
            ->seeInDatabase('teams', ['name' => 'Dream Team'])
            ->seePageIs('teams/Dream Team/invite');
    }
}
