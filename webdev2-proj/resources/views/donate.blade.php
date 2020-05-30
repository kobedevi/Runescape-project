@extends('layout')

@section('content')
        <div class="container news">
            <h1>{{ __('news.title') }}</h1>
            <main>

                <form action="">
                    <div class="together">
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" placeholder="fons">
                    </div>
                    <div class="together">
                        <label for="email">email</label>
                        <input type="email" name="email" id="email" placeholder="bla@bla.com">
                    </div>
                    <div class="together">
                        <label for="donation">donation</label>
                        <input type="number" name="donation" id="donation" placeholder="€7">
                    </div>
                    <div class="together">
                        <label for="email">Message</label>
                        <textarea name="" id=""></textarea>
                    </div>
                </form>

            </main>
        </div>
@endsection