<?php

use Pibbble\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfileSettingsTest extends TestCase
{
    use DatabaseTransactions;

    protected $baseUrl = 'http://localhost';

    public function testResponse()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->call('GET', '/settings/profile');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUpdateProfile()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->visit('/settings/profile')
              ->type('tests', 'username')
              ->type('tests@yahoo.com', 'email')
              ->press('Update Settings')
              ->see('You have successfully updated your profile');
    }
}
