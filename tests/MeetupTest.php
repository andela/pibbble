<?php

use Pibbble\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MeetupTest extends TestCase
{
    use DatabaseTransactions;

    protected $baseUrl = 'http://localhost';

    /***
     * Tests if users that are not logged in cannot access page.
     */

    public function testResponse()
    {
        $response = $this->call('GET', '/meetup/new');

        $this->assertEquals(302, $response->getStatusCode());
    }

    /***
     * Tests if logged-in users can successfully create a meetup.
     */

    public function testMeetupCreation()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->visit('/meetup/new')
              ->type('Lagos', 'city')
              ->type('55, Moleye street.', 'organizer_address')
              ->type('2348055012345', 'phone_no')
              ->press('Submit Meetup')
              ->see('');
    }
}
