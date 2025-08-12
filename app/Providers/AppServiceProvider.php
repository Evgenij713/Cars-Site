<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Country;
use App\Models\Tag;
use App\Policies\GeneralPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*// Вывод всех sql-запросов к БД на странице
        \Illuminate\Support\Facades\DB::beforeExecuting(function($query, $params){
            echo 'div';
            var_dump($query);
            var_dump($params);
            echo 'hr';
            echo '/div';
        });*/


        Gate::policy(Brand::class, GeneralPolicy::class);
        Gate::policy(Country::class, GeneralPolicy::class);
        Gate::policy(Tag::class, GeneralPolicy::class);
    }
}
