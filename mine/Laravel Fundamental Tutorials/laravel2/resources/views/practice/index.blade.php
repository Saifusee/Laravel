@extends('layout')
@section('content')
<a href="{{url('http://127.0.0.1:8000/home')}}"  style="color:white"><div class="btn btn-primary form-control"> Home</div></a>
<a href="{{action('CrudsController@create')}}"  style="color:white"> <div class="btn btn-primary form-control">Create New Article</div></a>

<h1 style="text-align: center"><b>Articles Topic in Trending</b></h1>
@foreach ($objects as $object)
<h2  style="text-align: center"><a href="{{action('CrudsController@show', $object->id)}}">{{$object->title}}</a></h2>
@endforeach
@stop
