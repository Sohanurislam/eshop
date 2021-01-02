<?php

namespace App\Providers;

use App\Policies\ProductPolicy;
use App\Product;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Product::class =>ProductPolicy::class,
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

        Gate::define('edit-user', function ($user) {
//            dd($user->activeRole->permissions);
            return in_array(1, $user->permissions());
        });

        Gate::define('show-user', function ($user) {
//            dd($user->activeRole->permissions);
            return in_array(2, $user->permissions());
        });

        Gate::resource('products','App\policies\ProductPolicy');

        Passport::routes();
        Passport::tokensExpireIn(now()->addDays(15));
    }
}
