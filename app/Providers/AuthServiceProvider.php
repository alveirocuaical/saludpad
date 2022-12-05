<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\AdminUserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',

        User::class => AdminUserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('view-document-index',function($user){
            return $user->role==='user'; 
        });

        Gate::define('updown-service',function($user){
            return $user->role==='user'; 
        });

        Gate::define('view-document-admin-index',function($user){
            return $user->role==='admin'; 
        });

    }
}
