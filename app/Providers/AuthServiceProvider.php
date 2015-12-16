<?php

namespace Pibbble\Providers;

use Auth;
use Pibbble\User;
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
    }
}
