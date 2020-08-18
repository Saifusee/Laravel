<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Tag;
use App\User;
use App\Http\Requests\CrudRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CrudsController extends Controller
{


    function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = Crud::latest('published_at')->published()->get();//see published() at Model its a custom scope

        return view('practice.index', compact('objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Basic way to Authenticate
        // if(Auth::guest()){
        //     return redirect(action('CrudsController@index'));
        // }
            $tags = Tag::pluck('name', 'id');
        return view('practice.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrudRequest $request)
    {
        session()->flash('message', 'Article Created, check some articles in trendng');
        //Alternate and easy way to authenticate if user log in and if login then use his user_id and allot it to article and create it
        // $form_data = $request->all();
        // $form_data['user_id'] = Auth::id();
        //Crud::create($form_data);

        // //Efficient way
        // $form_data = $request->all();//collect data from request
        // $article = new Crud($form_data);//create a new instance of MOdel or create article
        ////siince we use model route binding a instance of article already created we don't need to create it. ///

        // $article->tags()->attach($tags);
      $a = Auth::user()->articles()->create($request->all());  //get authorize user's all articles and save a new one
       $tags = $request->input('tags_list');
       $a->tags()->attach($tags);

        return redirect(action('CrudsController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(Crud $article)
    {

        return view('practice.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(Crud $article)
    {
        $tags = Tag::pluck('name', 'id');

       return view('practice.edit', compact('article', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Crud $article, CrudRequest $request)
    {
        session()->flash('message', 'Article Updated, check some articles in trendng');

        $form_update = $request->all();
        $article->update($form_update);

        $tags = $request->input('tags_list');
        $article->tags()->sync($tags);

        return redirect(action('CrudsController@index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crud $crud)
    {
        //
    }
}
