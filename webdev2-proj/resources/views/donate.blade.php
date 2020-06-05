@extends('layout')

@section('content')
        <div class="container news">
            <h1>{{ __('donate.title') }}</h1>
            <main>

                <form action="" method="POST" id="donate">
                    @csrf
                    <div class="large">
                        <p>{{__('donate.publication')}}<span class="required">*</span></p>
                        <div class="bigger">
                            <input type="radio" name="publication" id="publication1" value="private" checked>
                            <label for="publication1">{{__('donate.private')}}</label><br>
                        </div>
                        <div class="bigger">
                            <input type="radio" name="publication" id="publication2" value="public">
                            <label for="publication2">{{__('donate.public')}}</label><br>  
                        </div>
                    </div>

                    <div class="together">
                        <label for="name">{{__('donate.name')}}<span class="required">*</span></label>
                        <input type="text" name="name" id="name" placeholder="{{__('donate.nameExample')}}" required>
                    </div>

                    <div class="together">
                        <label for="email">{{__('donate.email')}}<span class="required">*</span></label>
                        <input type="email" name="email" id="email" placeholder="{{__('donate.emailExample')}}" required>
                    </div>
                    
                    <div class="together">
                        <label for="donation">{{ __('donate.donation') }}<span class="required">*</span></label>
                        <div class="currency">
                            <span >€</span>
                            <input type="number" name ="donation" min="0.1" step="0.01" max="999.99" placeholder="0.01" required/>
                        </div>
                    </div>

                    <div class="together large">
                        <label for="message">{{ __('donate.message') }}</label>
                        <textarea name="message" maxlength="250" placeholder="{{__('donate.message')}}..."></textarea>
                    </div>
                    <input type="submit" value="{{ __('donate.donate') }}">
                </form>

                <section class="donationcontainer">
                @foreach ($donations as $donation)
                    <section class="donationblock">
                        <h1>€ {{$donation->amount}}</h1>
                        <div class="right">
                            <h3>{{ $donation->name }}</h3>
                            {{-- translate months to nl if needed --}}
                            @if (App::getLocale() == 'nl')
                                <?php 
                                    $date = date('d F Y',  strtotime($donation->created_at));
                                    $datenl = str_ireplace($enmonths, $nlmonths, $date);
                                ?>
                                <i>{{ $datenl }}</i>
                            @else
                                <i>{{ date('d F Y',  strtotime($donation->created_at)) }}</i>
                            @endif
                        </div>                        
                    </section>
                @endforeach
                
                <div class="pages">
                    {{ $donations->links() }}
                </div>
            </section>

            </main>
        </div>
@endsection