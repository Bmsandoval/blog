<?php

namespace App\Providers;

use App\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Admin')) {
                return true;
            }
        });

        Gate::resource('posts', 'App\Policies\PostPolicy', [
            'blog' => 'canBlog',
            'edit' => 'canEdit',
            'delete' => 'canDelete',
        ]);

        Gate::after(function ($user, $ability, $result, $arguments) {
            // TODO : Enable logging
        });

    }
}
