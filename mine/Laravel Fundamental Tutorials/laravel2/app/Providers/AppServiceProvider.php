<?php

namespace App\Providers;
use App\Crud;
use App\Tag;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Route::bind('article', function($id)
        {
            return Crud::published()->findOrFail($id);
        });

        \Route::bind('tag', function($name)
        {
            return Tag::where('name', $name)->firstOrFail();
        });
    }
}
