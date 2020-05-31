<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Runescape Mobile - Not Found</title>
    <link rel="stylesheet" href="{{ mix('/css/error.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/branding/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/branding/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/branding/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/branding/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/branding/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">  
</head>
<body>
    <div>
        <img src="{{ asset('/images/branding/rs.png') }}">
        <h2>{{ $exception->getStatusCode() }}</h2>
        <h1>Oh bugger!</h1>
        <p>That particular combination of zeros and ones hasn't worked out...<br> Please head back to our homepage try again (sorry).</p>
        <a href="{{ url()->previous() }}">Take me home, I'm drunk</a>
    </div>
</body>
</html>