@extends('layout')

@section('content')
    <section class="attention">
        <img src="{{asset('/images/sec0.jpg')}}">
        <div class="title">
            <h1>RUNESCAPE ON<br><span>MOBILE</span></h1>
        </div>
    </section>

    <section class="splash">
        <img src="{{asset('/images/sec1.jpg')}}">
        <div class="left">
            <div class="container">
                <div class="text">
                    <h2>RUNESCAPE MOBILE EARLY ACCESS</h2>
                    <p>RuneScape Mobile Early Access is now available for all RuneScape players on Android.</p>
                    <p> Early Access is your chance to experience the magic of RuneScape on your mobile and with membership, grab the exclusive Mobile Founder's Pack. </p>
                </div>
            </div>
        </div>
    </section>

    <section class="splash">
        <img src="{{asset('/images/sec2.jpg')}}">
        <div class="right">
            <div class="container">
                <div class="text">
                    <h2>RUNESCAPE MOBILE EARLY ACCESS</h2>
                    <p>RuneScape Mobile Early Access is now available for all RuneScape players on Android.</p>
                    <p> Early Access is your chance to experience the magic of RuneScape on your mobile and with membership, grab the exclusive Mobile Founder's Pack. </p>
                </div>
            </div>
        </div>
    </section>

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