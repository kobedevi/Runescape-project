@extends('layout')

@section('content')
        <div class="container news detail" style="top:0">
            <h1>{{ $post->{'title_'.App::getLocale()} }}</h1>
            <main>
                <section>
                    <article>
                        <div class="intro">
                            {!! $post->{'intro_'.App::getLocale()} !!}
                        </div>
                        {!!$post->{'text_'.App::getLocale()} !!}
                    </article>
                </section>

            </main>
        </div>
@endsection