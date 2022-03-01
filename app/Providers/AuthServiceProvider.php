<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //  $this->registerRoles();

    }

    private function registerRoles()
    {
        try {
            foreach (Role::all() as $role) {
                Gate::define($role->role, function (User $user) use ($role) {
                    return $user->roles()->filterByRole($role->role)->count();
                    // return $user->roles()->filterByRole($role->role)->count() ? Response::allow() : Response::deny('Unauthorized');
                });
            }
        } catch (\Exception $e) {
            //
        }
    }
}
