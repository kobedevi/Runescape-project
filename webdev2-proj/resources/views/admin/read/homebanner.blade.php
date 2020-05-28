@extends('admin.layout')

@section('content')
<h1>{{ __('admin.homebanner') }}</h1>
<ul>
    <a class="add button" href="{{ route('homeBanner.add', app()->getLocale())}}">{{__('admin.add')}}</a>
    @foreach ( $banners as $banner)
        <li class="listitem">
            <div>
                <h3>{{ $banner->{'title_'.App::getLocale()} }}</h3>
                <img src="{{ asset('/images/banners/'. $banner->image) }}">
                <p>{{ $banner->{'text_'.App::getLocale()}  }}</p>
            </div>
            <div class="buttons">
                <a class="edit button" href="{{ route('homeBanner.edit', [app()->getLocale(), $banner->id])}}">{{__('admin.edit')}}</a>
                <a class="delete button" href="{{ route('homeBanner.destroy', ['language' => app()->getLocale(), 'banner' => $banner->id]) }}">{{__('admin.delete')}}</a>  
            </div>
        </li>
    @endforeach
</ul>
@endsection