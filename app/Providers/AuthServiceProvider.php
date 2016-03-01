<?php

namespace Pibbble\Providers;

use Auth;
use Pibbble\Permission;
use Pibbble\Team;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'Pibbble\Model' => 'Pibbble\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        $gate->define('owner-can-see', function ($user, $id) {
            return $id === $user->id;
        });

        $gate->define('users-can-see', function ($user, $id) {
            return $id !== $user->id;
        });

        $gate->define('authusers-can-see', function ($user) {
            return Auth::check();
        });

        $gate->define('approve-meetup', function ($user) {
            return $user->hasRole('meetup-admin');
        });

        $gate->define('user-in-team-can-see', function ($user, $team_id) {
            return Team::checkUserInTeam($team_id, $user->id);
        });

        $gate->define('user-not-in-team-can-see', function ($user, $team_id) {
            return ! Team::checkUserInTeam($team_id, $user->id);
        });
    }
}
