@extends('layout')
@section('content')
<div class="btn btn-primary form-control"><a style="color:white" href="{{action('CrudsController@edit', $objects->id)}}">Edit Article</a></div>
<h1  style="text-align: center">{{$objects->title}}</h1>
<h3  style="text-align: center">{{$objects->content}}</h3>
@stop
