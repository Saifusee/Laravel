@extends('layout')
@section('content')
<h1 style="text-align:center">Edit Article <b>{{$article->title}}</b></h1>

@include('errors.error')

{{-- Form Added Remember to use capital F--}}
{!! Form::model($article, ['method' => 'PATCH', 'action' => ['CrudsController@update', $article->id ]]) !!}

    @include('practice._form', ['buttontext' => 'Update Article'])

{{-- form close --}}
{!! Form::close(); !!}

@stop
