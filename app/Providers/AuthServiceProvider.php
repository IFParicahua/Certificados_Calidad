<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Gate;;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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

        //
        Gate::define('guardar', function (User $user) {
            for ($i=0; $i < $user->rol->rol_ops->count(); $i++) {
                if($user->rol->rol_ops[$i]->operation_id == '1'){
                    return true;
                }
            }
            return false;
        });

        Gate::define('editar', function (User $user) {
            for ($i=0; $i < $user->rol->rol_ops->count(); $i++) {
                if($user->rol->rol_ops[$i]->operation_id == '2'){
                    return true;
                }
            }
            return false;
        });

        Gate::define('eliminar', function (User $user) {
            for ($i=0; $i < $user->rol->rol_ops->count(); $i++) {
                if($user->rol->rol_ops[$i]->operation_id == '3'){
                    return true;
                }
            }
            return false;
        });

    }
}
