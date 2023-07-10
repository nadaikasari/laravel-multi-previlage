<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('index',   'App\Policies\PostPolicy@viewAny');
        Gate::define('create',   'App\Policies\PostPolicy@create');
        Gate::define('update',   'App\Policies\PostPolicy@update');
        Gate::define('delete',   'App\Policies\PostPolicy@delete');
        Gate::define('view',   'App\Policies\PostPolicy@view');
    }
}
