@extends('layout')

@section('content')
    <div class="backgroundbanner">
        <img class="newsbanner" src="{{ asset('images/news/'.$post->image) }}" alt="">
        <div class="container news detail">
            <h1><a href="{{ route('news', app()->getLocale()) }}">{{ __('news.title') }}</a></h1>
            <main>
                <article>
                    <h3>{{ $post->{'title_'.App::getLocale()} }}</h3>
                    <div class="intro">
                        {!! $post->{'intro_'.App::getLocale()} !!}
                    </div>
                    {!! $post->{'text_'.App::getLocale()} !!}
                </article>
            </main>
        </div>
    </div>
@endsection