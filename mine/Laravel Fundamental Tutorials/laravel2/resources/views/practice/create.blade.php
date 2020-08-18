@extends('layout')
@section('content')
<h1 style="text-align:center">Add New article</h1><br><br>

@include('errors.error')

{{-- Form Added Remember to use capital F--}}
{!! Form::open(['action' => 'CrudsController@index']) !!}

    @include('practice._form', ['buttontext' => 'Add Article'])

{{-- form close --}}
{!! Form::close(); !!}
@stop
