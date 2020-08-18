<?php

namespace App\Providers;
use App\Crud;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * Our view composer we make a function and call it here to follow DRY principle to view composing the nav.blade.php have $latest variable
     *
     * @return void
     */
    public function boot()
    {
        $this->composerNavigation();
    }


    private function composerNavigation(){
/* WE can use view composing two way for simple work like  a miute value do the commented code, but for larger things
wecan declare a class to perform whole function like the non commented part where you can compose a view and follow the class and create
it in service container of laravel like i created */
        // view()->composer('practice.nav', function($view){
        //     $view->with('latest', Crud::latest()->first());
        // });

        view()->composer('practice.nav', 'App\Http\Composers\NavigationComposer@compose');
    }
}
