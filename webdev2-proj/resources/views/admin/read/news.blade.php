@extends('admin.layout')

@section('content')
<h1>{{ __('admin.news') }}</h1>
<ul>
    <a class="add button" href="{{ route('newsAdmin.add', app()->getLocale())}}">{{__('admin.add')}}</a>
    @foreach ( $posts as $post)
        <li class="listitem">
            <div>
                <h3>{{ $post->{'title_'.App::getLocale()} }}</h3>
                <img src="{{ asset('/images/news/'. $post->image) }}">
                <p>{{ $post->{'text_'.App::getLocale()}  }}</p>
            </div>
            <div class="buttons">
                <a class="edit button" href="{{ route('newsAdmin.edit', [app()->getLocale(), $post->id])}}">{{__('admin.edit')}}</a>
                <a class="delete button" href="{{ route('newsAdmin.destroy', ['language' => app()->getLocale(), 'id' => $post->id]) }}">{{__('admin.delete')}}</a>  
            </div>
        </li>
    @endforeach
</ul>
@endsection