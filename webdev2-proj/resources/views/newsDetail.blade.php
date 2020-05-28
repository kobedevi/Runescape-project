@extends('layout')

@section('content')
    <div class="backgroundbanner">
        <img class="newsbanner" src="{{ asset('images/news/'.$post->image) }}" alt="">
        <div class="container news detail">
            <h1><a href="{{ route('news', app()->getLocale()) }}">{{ __('news.title') }}</a></h1>
            <main>
                <article>
                    <h3>{{ $post->{'title_'.App::getLocale()} }}</h3>
                    <p class="intro">{{ $post->{'intro_'.App::getLocale()} }}</p>
                    <p class="text">{{ $post->{'text_'.App::getLocale()} }}</p>
                </article>
            </main>
        </div>
    </div>
@endsection