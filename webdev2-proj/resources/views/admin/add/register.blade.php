@extends('admin.layout')

@section('content')
<div class="container">
    <h1>{{ __('admin.adduser')}}</h1>

    <form method="POST" action="{{ route('saveAdmin.register', app()->getLocale()) }}">
        @csrf

        <div>
            <div class="together">
                <label for="name">{{ __('contact.name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{__('contact.nameExample')}}" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="together">
                <label for="email">{{ __('contact.email') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{__('contact.emailExample')}}"value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="together">
                <label for="password">{{ __('contact.password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="***********">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="together">
                <label for="password-confirm">{{ __('contact.confirm') . " " . __('contact.password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="***********">
            </div>
            
            <button type="submit" class="btn btn-primary">
                {{ __('users.register') }}
            </button>
        </div>
    </form>

@endsection
