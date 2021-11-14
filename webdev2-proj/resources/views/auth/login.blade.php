@extends('layout')

@section('content')

    <style>
        form div.eye{
            width: 100%;
            cursor: pointer;
            position: relative;
        }
        #password {
            padding: 8px 35px 8px 8px;
        }
        #toggle{
            all: unset;
            width: 35px;
            height: 100%;
            border-radius: 50px;
            overflow: visible;
            display: flex;
            justify-content: center;
            position: absolute;
            right: 0;
            top: 50%;
            transform: translate(0, -50%);
        }
        #toggle img{
            width: 16px;
            filter: invert(.5);
        }
    </style>
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
                <div class="currency eye">  
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••••">
                    <span toggle="#password-field" id="toggle"><img id="icon" src="{{ asset('images/eye_open.svg') }}" alt="show/hide password"></span>
                </div>
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

    {{-- show password --}}
    <script>
        let toggle= document.getElementById('toggle');
        let password= document.getElementById('password');
        let icon= document.getElementById('icon');
        toggle.addEventListener("click", function() {
            if (password.type == 'password') {
                password.type = 'text';
                icon.src='{{ asset("images/eye_closed.svg") }}';
                // toggle.style.opacity = ".45";
            } else {
                password.type = 'password';
                icon.src='{{ asset("images/eye_open.svg") }}';
                // toggle.style.opacity = "1";
            }       
        });
    </script>

@endsection
