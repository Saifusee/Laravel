@extends('layout')
@section('content')
<h1>
    <ul>
    <h3>The parameter you provide in URL is {{$id}}</h3>
    @foreach ($elements as $element)
        <li>{{$element}}</li>
    @endforeach
    </ul>
</h1>
@stop