@extends('layout')

@section('content')
        <div class="container news">
            <h1>{{ __('header.about') }}</h1>
            <main>
                <section >
                    <article>
                        {!!$text->{'text_'.App::getLocale()} !!}
                    </article>
                </section>

            </main>
        </div>
@endsection