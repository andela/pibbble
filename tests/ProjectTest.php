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
}
