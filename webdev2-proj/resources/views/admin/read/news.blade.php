@extends('admin.layout')

@section('content')
<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Intro</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $posts as $post)
            <tr>
                <td>
                    <div>
                        <h3>{{  $post->{'title_'.App::getLocale()} }}</h3>
                        <img src="{{ asset('/images/news/'. $post->image) }}">
                    </div>
                </td>
                <td class="intro">{{ Str::limit($post->{'intro_'.App::getLocale()}, 200) }}</td>
                <td class="buttons">
                    <a class="edit button" href="{{ route('pages.edit', [app()->getLocale(), $post->id])}}">{{__('admin.edit')}}</a>
                    <a class="delete button" href="{{ route('pages.destroy', ['language' => app()->getLocale(), 'id' => $post->id]) }}">{{__('admin.delete')}}</a>  
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection