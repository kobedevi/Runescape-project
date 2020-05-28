<html lang="en">
<head>
    <!DOCTYPE html>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Runescape mobile - admin panel</title>
    <link rel="stylesheet" href="{{ mix('/css/contact.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/news.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/dashboard.css') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/branding/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/branding/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/branding/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/branding/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/branding/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <header>
        <div class="toolbar">
            <div class="container">
                <ul>
                    <li class="lang"><a @if(App::getLocale() == 'en') class="active" @endif href="{{ route(Route::currentRouteName(), ['language' => 'en']) }}">EN</a></li>  
                    <li class="lang"><a @if(App::getLocale() == 'nl') class="active" @endif href="{{ route(Route::currentRouteName(), ['language' => 'nl']) }}">NL</a></li>  
                    {{-- <li><a class="cta" href="{{ route('logout', app()->getLocale()) }}"  >{{ __('header.logout') }}</a></li> --}}
                    {{-- <li><a class="cta" href="#" onclick="location.replace('/logout')" >{{ __('header.logout') }}</a></li> --}}
                    <li role="menuitem">
                        <a style='' href="{{ route('logout', app()->getLocale()) }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            {{ __('header.logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
        <nav>
            <div class="container">
                <ul>
                    <li class="logo" ><a href="{{ route('start', app()->getLocale()) }}">Runescape</a></li>
                    <li><a href="{{ route('start', app()->getLocale()) }}">{{ __('header.home') }}</a></li>
                </ul>
            </div>
        </nav>
    </header>