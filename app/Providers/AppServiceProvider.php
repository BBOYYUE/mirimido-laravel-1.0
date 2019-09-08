<?php

namespace App\Providers;

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
        $this->app->singleton(format::class, function ($app) {
            return new \App\Fomat\format;
        });
        $this->app->singleton(blogCore::class, function ($app) {
            return new \App\Project\Blog\blogCore;
        });
        $this->app->singleton(makeFile::class, function ($app) {
            return new \App\File\makeFile;
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
