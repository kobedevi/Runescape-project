@extends('admin.layout')

@section('content')
<h1>{{ __('admin.homebanner') }}</h1>

<a class="add button" href="{{ route('homeBanner.add', app()->getLocale())}}">{{__('admin.add')}}</a>
<table>
    <thead>
        <tr>
            <th>{{__('admin.form.title')}}</th>
            <th>{{__('admin.form.text')}}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $banners as $post)
            <tr>
                <td>
                    <div>
                        <h3>{{  $post->{'title_'.App::getLocale()} }}</h3>
                        <img src="{{ asset('/images/banners/'. $post->image) }}">
                    </div>
                </td>
                <td class="intro">{{ Str::limit($post->{'text_'.App::getLocale()}, 100) }}</td>
                <td class="buttons">
                    <a class="edit button" href="{{ route('homeBanner.edit', [app()->getLocale(), $post->id])}}">{{__('admin.edit')}}</a>
                    <a class="delete button" href="{{ route('homeBanner.destroy', ['language' => app()->getLocale(), 'id' => $post->id]) }}">{{__('admin.delete')}}</a>  
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection