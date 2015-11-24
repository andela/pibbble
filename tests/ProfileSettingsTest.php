<?php

use Pibbble\User;

class ProfileSettingsTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    public function testResponse()
    {
        $user = User::find(4);
        $this->actingAs($user);

        $response = $this->call('GET', '/profile/settings');

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testUpdateProfile()
    {
        $user = User::find(4);
        $this->actingAs($user);

        $this->visit('/profile/settings')
              ->type('tests', 'username')
              ->type('tests@yahoo.com', 'email')
              ->press('Update Settings')
              ->see('You have successfully updated your profile.');
    }
}
