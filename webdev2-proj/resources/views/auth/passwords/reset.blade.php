@extends('layout')

@section('content')
<div class="container">
    <form method="POST" class="contact" action="{{ route('password.update', app()->getLocale()) }}">
        @csrf
        <h1>{{ __('contact.reset') }}</h1>
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="row">
            <label for="email">{{ __('contact.email') }}</label>
            <div class="large">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $_GET['email'] ?? old('email') }}" required autocomplete="{{ $_GET['email'] ?? old('email') }}" placeholder="{{ __('contact.emailExample')}}"autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <label for="password">{{ __('contact.password') }}</label>

            <div class="large">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="************">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <label for="password-confirm">{{ __('contact.confirm') . " " . __('contact.password') }}</label>

            <div class="large">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="************">
            </div>
        </div>

        <button type="submit" class="submit longButton">
            {{ __('contact.resetPassword') }}
        </button>
    </form>
</div>
@endsection