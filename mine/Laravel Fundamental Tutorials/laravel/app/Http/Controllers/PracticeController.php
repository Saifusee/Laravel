<?php
namespace App\Http\Controllers;
use App\Practice;


use Illuminate\Http\Request;

class PracticeController extends Controller
{
    function greet(){
        $firstname = 'Saiful';
        $lastname = 'Khan';
        return view('practice.practice',compact('firstname', 'lastname'));
    }

    function id($id){
        $elements = ['jeff','gustav','rehman','yunus'];
        return view('practice.practice2', compact('elements','id'));
    }

    function database(){
        $articles = Practice::all()->toArray();
        return view('practice.practice3', compact('articles'));
    }
    function dataid($id){
        $articles = Practice::find($id)->toArray();
        if(is_null($articles)){
            abort(404);
        }
        return view('practice.practice4', compact('articles'));
    }


    function create(){
        return view('practice.practice5');
    }

}
