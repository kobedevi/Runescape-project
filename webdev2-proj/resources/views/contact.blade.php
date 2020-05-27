@extends('layout')

@section('content')
        <div class="container">
            <form action="" method="POST" class="contact">
                @csrf
                <div class="">
                    <label for="name">{{ __('contact.name') }}<span class="required">*</span></label>
                    <input type="text" name="name" placeholder="{{ __('contact.nameExample') }}" required>  
                </div>
                <div>
                    <label for="email">{{ __('contact.email') }}<span class="required">*</span></label>
                    <input type="email" name="email" placeholder="{{ __('contact.emailExample') }}" required> 
                </div>
                <label for="message">{{ __('contact.message') }}<span class="required">*</span></label>
                <textarea name="message" placeholder="{{ __('contact.message') }}" required></textarea> 
                <input type="submit" value="{{ __('contact.button') }}">
            </form>
        </div>

@endsection