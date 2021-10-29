<?php

namespace App\Providers;

use App\Models\Book;
use App\Policies\BookPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        Gate::define('get-loan',function (User $user, Book $book) {
            return $user->cpf != null
                && $user->address != null
                && $user->phone != null
                && $user->open_loan == 0
                && $book->available == 1;
        });

        Gate::define('update',function (User $user) {
            return $user->hierarchy_level >= 2;
        });

        Gate::define('create',function (User $user) {
            return $user->hierarchy_level >= 2;
        });

        Gate::define('delete',function (User $user) {
            return $user->hierarchy_level === 3;
        });

        Gate::define('update-level',function (User $user) {
            return $user->hierarchy_level === 3;
        });

        Gate::define('update-level',function (User $user) {
            return $user->hierarchy_level === 3;
        });
    }
}
