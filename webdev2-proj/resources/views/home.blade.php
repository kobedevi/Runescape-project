@extends('layout')

@section('content')
{{-- main banner! --}}
    <section class="attention">
        <img src="{{asset('/images/sec0.jpg')}}">
        <div class="title">
            <h1>RUNESCAPE ON<br><span>MOBILE</span></h1>
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
                    <h2>{{ $banner->title_eng}}</h2>
                    {!!$banner->text_eng!!}
                </div>
            </div>
        </div>
    </section>
    @endforeach

    {{-- newsletter sign up --}}
    <section class="newsletter">
        <div class="container">
            <form action="">
                @csrf
                <label for="email">Sign up for our newsletter</label><br>
                <input type="email" name="email" placeholder="someone@example.com">
                <input class="test" type="submit" value="SIGN UP">
            </form>
        </div>
    </section>

@endsection