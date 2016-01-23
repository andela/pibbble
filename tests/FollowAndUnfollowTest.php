<?php

use Pibbble\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FollowAndUnfollowTest extends TestCase
{
    use DatabaseMigrations;

    public function testFollowUser()
    {
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();
        $user4 = factory(User::class)->create();

        $user1->follows()->save($user2);
        $user1->follows()->save($user3);
        $user1->follows()->save($user4);

        $usernames = [$user2->username, $user3->username, $user4->username];

        $following = User::find($user1->id)->follows()->get();
        $this->assertCount(3, $following);

        foreach ($following as $user) {
            $this->assertContains($user->username, $usernames);
        }
    }

    public function testFollowersOfUser()
    {
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $user3 = factory(User::class)->create();
        $user4 = factory(User::class)->create();

        $user1->follows()->save($user4);
        $user2->follows()->save($user4);
        $user3->follows()->save($user4);

        $usernames = [$user1->username, $user2->username, $user3->username];

        $followers = User::find($user4->id)->followers()->get();

        $this->assertCount(3, $followers);

        foreach ($followers as $follower) {
            $this->assertContains($follower->username, $usernames);
        }
    }
}
