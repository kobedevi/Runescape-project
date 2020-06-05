<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Runescape Mobile - Thank you</title>
    <link rel="stylesheet" href="{{ mix('/css/error.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/responsive.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/branding/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/branding/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/branding/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/branding/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/branding/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">  
</head>
<body class="errorContainer">
    <div>
        <img src="{{ asset('/images/branding/rs.png') }}">
        <h1 class="errorTitle">{{__('donate.succes.thanks')}}</h1>
        <p>{{__('donate.succes.info')}}</p>
        <a href="{{ route('donate', app()->getLocale()) }}">{{__('donate.succes.back')}}</a>
    </div>
</body>
</html>