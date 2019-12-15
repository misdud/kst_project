<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('show_users_admin', function(User $user){
            $roles = $user->roles()->get();
            foreach ($roles as $role){
                if($role->rolename == 'admin'){
                    return TRUE;
                }
            }
           return FALSE;
        });
        
        Gate::define('show_mang_kanc_admin', function(User $user){
            $roles = $user->roles()->get();
            foreach ($roles as $role){
                if($role->rolename == 'admin' || $role->rolename == 'mang_kanc'){
                    return TRUE;
                }
            }
           return FALSE;
        });
        
        Gate::define('show_moder_kanc_admin', function(User $user){
            $roles = $user->roles()->get();
            foreach ($roles as $role){
                if($role->rolename == 'admin' || $role->rolename == 'moder_kanc'){
                    return TRUE;
                }
            }
           return FALSE;
        });

        //
    }
}
