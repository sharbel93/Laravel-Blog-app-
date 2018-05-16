@extends('layouts.app')
@section('content')
    @guest
<a href="/posts" class="btn btn-default"> Go back</a>
    <h1>{{ $post->title }}</h1>
<img style="width: 40%;" src="/storage/cover_images/{{ $post->cover_image }}">
<br>
<br>
    <div>
        {!! $post->body  !!}
    </div>
<hr>
    <small> Written on {{ $post->created_at }} by {{ $post->user['name'] }}</small>
@endguest
@auth

    <a href="/posts" class="btn btn-default"> Go back</a>
    <h1>{{ $post->title }}</h1>
    <img style="width: 40%;" src="/storage/cover_images/{{ $post->cover_image }}">
    <br>
    <br>
    <div>
        {!! $post->body  !!}
    </div>

    <small> Written on {{ $post->created_at }} by {{ $post->user['name'] }}</small>
    @if(Auth::user()->id == $post->user_id)
    <hr>
<a href="/posts/{{ $post->id }}/edit" class="btn btn-default"> Edit</a>

    {!! Form::open(['action'=> ['PostsController@destroy', $post->id], 'method'=> 'POST', 'class' => 'float-right']) !!}
          {{Form::hidden('_method', 'DELETE')}}
          {{ Form::submit('Delete', ['class'=> 'btn btn-danger']) }}
    {!! Form::close() !!}
        @endif
@endauth
@endsection
