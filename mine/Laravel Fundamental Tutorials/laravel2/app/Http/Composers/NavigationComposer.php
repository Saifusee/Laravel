<?php
namespace App\Http\Composers;

use Illuminate\View\View;

  class NavigationComposer
  {


    public function compose(View $view) {
        $view->with('latest', \App\Crud::latest()->first());
    }



  }
