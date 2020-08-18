@extends('layout')
@section('content')
<a style="color:white" href="{{action('CrudsController@edit', $article->id)}}"><div class="btn btn-primary form-control">Edit Article</div></a>
<h1  style="text-align: center">{{$article->title}}</h1>
<h3  style="text-align: center">{{$article->content}}</h3>

@foreach ($article->tags as $tag)
<br><ul style="text-align: center;
list-style: inside">
    <li>{{$tag->name}}</li>
</ul>

@endforeach


@stop
