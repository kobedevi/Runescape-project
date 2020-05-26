@extends('layout')

@section('content')
    <section class="attention">
        <img src="{{asset('/images/sec0.jpg')}}">
        <div>
            <h1>RUNESCAPE ON<br><span>MOBILE</span></h1>
        </div>
    </section>

    <section class="splash">
        <img src="{{asset('/images/sec1.jpg')}}">
        <div class="left container">
            <h2>RUNESCAPE MOBILE EARLY ACCESS</h2>
            <p>RuneScape Mobile Early Access is now available for all RuneScape players on Android.</p>
            <p> Early Access is your chance to experience the magic of RuneScape on your mobile and with membership, grab the exclusive Mobile Founder's Pack. </p>
        </div>
    </section>
@endsection