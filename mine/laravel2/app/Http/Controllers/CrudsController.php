<?php

namespace App\Http\Controllers;

use App\Crud;
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

        return view('practice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrudRequest $request)
    {
        //Alternate and easy way to authenticate if user log in and if login then use his user_id and allot it to article and create it
        // $form_data = $request->all();
        // $form_data['user_id'] = Auth::id();
        //Crud::create($form_data);

        //Efficient way
        $form_data = $request->all();//collect data from request
        $crud = new Crud($form_data);//create a new instance of MOdel or create article
        Auth::user()->articles()->save($crud);  //get authorize user's all articles and save a new one
        return redirect(action('CrudsController@index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objects = Crud::findOrFail($id);
        return view('practice.show', compact('objects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $editable_article = Crud::findOrFail($id);
       return view('practice.edit', compact('editable_article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update($id, CrudRequest $request)
    {
        $update = Crud::findOrFail($id);
        $update->update($request->all());
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
