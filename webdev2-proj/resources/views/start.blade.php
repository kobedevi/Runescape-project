@extends('layout')

@section('content')
{{-- main banner! --}}
    <section class="attention">
        <img src="{{asset('/images/sec0.jpg')}}">
        <div class="title">
            <h1>{!! __('home.bigTitle') !!}</h1>
        </div>
    </section>

    {{-- attraction banners --}}
    @foreach ($banners as $banner)
    <section class="splash">
        <img src="{{ asset('/images/banners/'. $banner->image) }}">
            @if($banner->position == 'l')
                <div class="left">
            @else
                <div class="right">
            @endif
            <div class="container">
        
            @if($banner->color == "d")
                <div class="text dark">
            @else
                <div class="text">
            @endif
                    <h2>{{ $banner->{'title_'.App::getLocale()} }}</h2>
                    {!! $banner->{'text_'.App::getLocale()}  !!}
                </div>
            </div>
        </div>
    </section>
    @endforeach

    {{-- newsletter sign up --}}
    <section id="newsletter" class="newsletter">
        <div class="container">
        <form action="" method="POST">
                @csrf
                <label for="user_email">{{ __('home.newsletter') }}</label><br>
                <input type="email" name="user_email" placeholder="{{ __('home.examplemail') }}" required>
                <input type="submit" value="{{ __('home.signup') }}">
            </form>
        </div>
    </section>

@endsection