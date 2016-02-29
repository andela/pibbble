<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    protected $baseUrl = 'http://localhost';

    /**
     * Test for commenting on project
     *
     * @return void
     */
    public function testCommentOnProject()
    {
        $user = factory(Pibbble\User::class)->create();
        $project = factory(Pibbble\Project::class)->create();

        $comment = 'This is a comment';

        $response = $this->actingAs($user)
                    ->call(
                        'POST',
                        '/comment/'.$project->id,
                        [
                            'comment' => $comment,
                        ]
                    );
        $this->assertEquals(200, $response->status());
        $this->seeInDatabase('project_comments', ['comment' => $comment]);
    }

    /**
     * Test for liking a project on project
     *
     * @return void
     */
    public function testLikingAProject()
    {
        $user = factory(Pibbble\User::class)->create();
        $project = factory(Pibbble\Project::class)->create();

        // Like a project
        $response = $this->actingAs($user)
                    ->call(
                        'GET',
                        '/project/like/'.$project->id
                    );
        $this->assertEquals(200, $response->status());
        $this->seeInDatabase('projects_likes', ['user_id' => $user->id, 'project_id' => $project->id]);

        // Unlike a project
        $response = $this->actingAs($user)
                    ->call(
                        'GET',
                        '/project/like/'.$project->id
                    );
        $this->dontSeeInDatabase('projects_likes', ['user_id' => $user->id, 'project_id' => $project->id]);
    }

    /**
     * Test for viewing a project on project
     *
     * @return void
     */

    public function testViewProject()
    {
        $user = factory(Pibbble\User::class)->create();
        $project = factory(Pibbble\Project::class)->create();

        $this->visit('/project/view/'.$project->id)
            ->seeInDatabase('projects', ['id' => 1,'views' => 1])
            ->visit('/project/view/'.$project->id)
            ->seeInDatabase('projects', ['id' => 1,'views' => 2]);
    }
}
