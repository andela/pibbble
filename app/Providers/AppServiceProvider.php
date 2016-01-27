<?php

namespace Pibbble\Providers;

use Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('validurl', function ($attribute, $value, $parameters, $validator) {
            return [$value] === preg_grep("/^(https?:\/\/)?([\da-z\.\-]+)\.([a-z\.]{2,6})([\/\w \.]*)*((\?\w+=\w+)(&\w+=\w+)*)?$/", [$value]);
        }, 'Invalid web address!');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
