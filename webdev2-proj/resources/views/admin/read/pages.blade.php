@extends('admin.layout')

@section('content')
<h1>{{ __('admin.pages') }}</h1>
    <a class="add button" href="{{ route('pages.save', app()->getLocale())}}">{{__('admin.add')}}</a>

    <table>
        <thead>
            <tr>
                <th>{{__('admin.form.title')}}</th>
                <th>{{__('admin.form.intro')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $posts as $post)
                <tr>
                    <td>{{ $post->{'title_'.App::getLocale()} }}</td>
                    <td class="intro">{{ Str::limit($post->{'intro_'.App::getLocale()}, 50) }}</td>
                    <td class="buttons">
                        <a class="edit button" href="{{ route('pages.edit', [app()->getLocale(), $post->id])}}">{{__('admin.edit')}}</a>
                        <a class="delete button" href="{{ route('pages.destroy', ['language' => app()->getLocale(), 'id' => $post->id]) }}">{{__('admin.delete')}}</a>  
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection