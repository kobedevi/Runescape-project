@extends('layout')

@section('content')
        <div class="container news">
            <h1>{{ __('news.title') }}</h1>
            <main>

                @foreach ($blogs as $blog)
                        <a href="{{ route('news.detail', ['language' => App::getLocale(), 'id' => $blog->id ]) }}">
                        <section class="newsblock">
                            <img src="{{ asset('/images/news/'. $blog->image) }}">
                            <article>
							<h3>{{ $blog->{'title_'.App::getLocale()} }}</h3>
							
							{{-- translate months to nl if needed --}}
							@if (App::getLocale() == 'nl')
								<?php 
									$date = date('d M Y',  strtotime($blog->created_at));
									$datenl = str_ireplace($enmonths, $nlmonths, $date);
								?>
								<i>{{ $datenl }}</i>
							@else
								<i>{{ date('d M Y',  strtotime($blog->created_at)) }}</i>
							@endif
							
                                <div class="intro"><p>{{ $blog->{'intro_'.App::getLocale()} }}</p><span>read more</span></div>
                            </article>
                        </section>
                    </a> 
                @endforeach
                
                <div class="pages">
                    {{ $blogs->links() }}
                </div>

            </main>
        </div>
@endsection