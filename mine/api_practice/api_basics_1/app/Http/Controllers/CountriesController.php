<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;
use Validator;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Country $country)
    {
        $this->noInstance($country);
        
        return response()->json($country->all(), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $rules = 
        [
            'iso' => 'required|min:2|max:2',
            'name' => 'required|min:3|max:20',
            'dname' => 'required|min:3|max:20',
            'iso3' => 'required|min:2|max:3',
            'position' => 'required|min:1|max:2',
            'numcode' => 'required|max:10',
            'phonecode' => 'required|max:10',
            'created' => 'required|min:1|max:10',
            'register_by' => 'required|min:1|max:2',
            'modified' => 'required|min:1|max:10',
            'modified_by' => 'required|min:1|max:2'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
            return response()->json($validator->errors(),400);
        }
        $create = Country::create($request->all());
        return response()->json($create, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return $this->noInstance();
        }
        else 
        {
            return response()->json($country, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $country = Country::find($id);
        if(is_null($country))
        {
            return $this->noInstance();
        }
        else 
        {
            $update = $country->update($request->all());
            return response()->json($update,201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        if(is_null($country))
        {
            return $this->noInstance();
        }
        else 
        {
            $delete = $country->delete();
            return response()->json(null,204);
        }
    }


    private function noInstance()
    {
            return response()->json(["message" => "No Data Found"], 404);
        
    }
}
