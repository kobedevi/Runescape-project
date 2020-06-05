@extends('layout')

@section('content')
<div class="container">
    @if (session('status'))
    @endif

    <form method="POST" class="contact" action="{{ route('password.email', ['language' => app()->getLocale()]) }}">
        @csrf
        <h1>{{ __('contact.forgot') }}</h1>

        
        <div class="row">
            <label for="email">{{ __('contact.email') }}<span class="required">*</span></label>

            <div class="large">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ old('email') }}" placeholder="{{ __('contact.emailExample') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            </div>
        </div>

        <button type="submit" class="submit longButton">
            {{ __('contact.passwordButton') }}
        </button>
    </form>
</div>
@endsection
