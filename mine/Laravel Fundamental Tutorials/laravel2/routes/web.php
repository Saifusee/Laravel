<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*  Practicing only how to bind a class
// class Ruby{};
interface gemInterface {}
class Gem implements gemInterface
 {
    // public $rubby;
    // public function __construct(Ruby $ruby)
    // {
    //     $this->rubby = $ruby;
    // }

}
class Ruby implements gemInterface
{

}

App::bind('gemInterface', 'Gem');


Route::get('gem', function (gemInterface $gem){
    return dd($gem);
});*/



Route::get('/', function () {
    return view('welcome');
});

// Route::get('articles','CrudsController@index');
// Route::get('articles/create','CrudsController@create');
// Route::post('articles','CrudsController@store');
// Route::get('articles/{id}', 'CrudsController@show');
//if you use all the name convention properly you can use only this Route instead of all above, check route list by php artisan route:list
Route::resource('articles', 'CrudsController');

Route::get('tags/{tag}', 'TagsController@index');

Route::get('bar', ['middleware' => 'manager', function(){
    return 'You\'re a Manager Man, you can see this page.';
}]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

