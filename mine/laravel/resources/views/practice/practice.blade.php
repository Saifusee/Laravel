@extends('layout')
@section('content')
<div>
<h1>Hii there</h1>
@if ($firstname == 'Saiful')
<h3>{{$firstname}} {{$lastname}}</h3>
@else
<h3>Nope</h3>
@endif
</div>
@stop