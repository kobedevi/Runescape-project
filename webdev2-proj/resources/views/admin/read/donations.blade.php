@extends('admin.layout')

@section('content')
<h1>{{ __('admin.donations') }}</h1>
<ul>
    @foreach ( $donations as $donation)
        <li class="listitem">
            <div class="donation">
                <div class="titles">
                    <h3>{{ $donation->name }}</h3>
                    @if ( $donation->public == 'public')
                        <h4>{{__('donate.public')}}</h4>
                    @else
                        <h4>{{__('donate.private')}}</h4>
                    @endif
                </div>
                <div class="donationText">
                    <p class="full">{{ $donation->message }}</p>
                    <div class="data">   
                        <h2>€ {{$donation->amount}}</h2>
                        <p>{{ $donation->created_at }}</p>
                    </div>
                </div>
            </div>
        </li>
    @endforeach
</ul>

@endsection