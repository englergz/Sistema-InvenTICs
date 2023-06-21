<?php

namespace App\Providers;

use DB;
use Schema;
use Illuminate\Support\ServiceProvider;

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
        if ( app()->environment('production') )
        {
           // include base_path('demo.php');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);

        DB::statement("SET lc_time_names = 'es_ES'");
        
    }
}
