@extends('layout')

@section('content')
    <div class="container">
        <form action="{{ route('login', App()->getLocale()) }}" method="POST" class="contact">
            <h1>{{ __('header.login') }}</h1>
            @csrf
            <div class="">
                <label for="email">{{ __('contact.email') }}<span class="required">*</span></label>
                <input id="email" type="email" placeholder="{{ __('contact.emailExample') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password">{{ __('contact.password') }}<span class="required">*</span></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="row">
                <div class="remember">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                    <label class="form-check-label" for="remember">
                        {{ __('contact.remember') }}
                    </label>
                </div>
    
                @if (Route::has('password.request'))
                    <a class="forgot" href="{{ route('password.request',  ['language' => App()->getLocale()]) }}">
                        {{ __('contact.forgot') }}
                    </a>
                @endif
            </div>

            <input type="submit" class="submit" value="{{ __('header.login') }}">

        </form>
    </div>
@endsection
