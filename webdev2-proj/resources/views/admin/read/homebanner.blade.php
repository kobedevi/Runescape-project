@extends('admin.layout')

@section('content')
<ul>
    <a class="add button" href="{{ route('homeBanner.add', app()->getLocale())}}">ADD</a>
    @foreach ( $banners as $banner)
        <li class="listitem">
            <div>
                <h3>{{ $banner->{'title_'.App::getLocale()} }}</h3>
                <img src="{{ asset('/images/banners/'. $banner->image) }}">
                <p>{{ $banner->{'text_'.App::getLocale()}  }}</p>
            </div>
            <div class="buttons">
                <a class="edit button" href="{{ route('homeBanner.edit', [app()->getLocale(), $banner->id])}}">BEWERK</a>
                <a class="delete button" href="{{ route('homeBanner.destroy', $banner->id) }}">DELETE</a>  
            </div>
        </li>
    @endforeach
</ul>
@endsection