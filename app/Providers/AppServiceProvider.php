<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('kullanici',function(){
            return Auth::user()->hasRole('Kullanıcı');
        });

        Gate::define('yonetici',function(){
            return Auth::user()->hasRole('Yönetici');
        });

       
    }
}
