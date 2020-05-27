@extends('layout')

@section('content')
        <div class="container news">
            <h1>{{ __('news.title') }}</h1>
            <main>
                <h3>{{ $post->{'title_'.App::getLocale()} }}</h3>
                <h3>{{ $postid = $post->id }}</h3>
                <h3>{{ $postid }}</h3>
            </main>
        </div>
@endsection