@extends('layout')

@section('content')
@foreach($articles as $article)
<h3><a href="{{action('PracticeController@dataid', $article['id'])}}">{{$article['Name']}}</a> have {{$article['Hobby']}}, and they are {{$article['Description']}}
& they registered on Database at {{$article['created_at']}}</h3>
@endforeach
@stop