@extends('layout')

@section('content')
    <div class="container">
        <form action="{{ route('login', App()->getLocale()) }}" method="POST" class="contact">
            @csrf
            <div class="">
                <label for="email">{{ __('E-Mail Address') }}<span class="required">*</span></label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password">{{ __('Password') }}<span class="required">*</span></label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>

            <input type="submit" value="{{ __('Login') }}">

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request',  App()->getLocale()) }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif

        </form>
    </div>
</div>
@endsection
