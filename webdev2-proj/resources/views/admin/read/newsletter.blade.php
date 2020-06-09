@extends('admin.layout')

@section('content')
<h1>{{ __('admin.newsletter') }}</h1>
    <a class="add button" href="{{ route('newsletter.create', app()->getLocale())}}">{{__('admin.add')}}</a>
    
    <form action="" method="POST">
    <table>
        <thead>
            <tr>
                <th>API key</th>
                <th>active</th>
                <th></th>
            </tr>
        </thead>
            @csrf
            <tbody>
                @foreach ( $keys as $key)
                    <tr>
                        <td class="key">{{ $key->key }}</td>
                        <td>
                            <label class="switch">
                                <input type="radio" name="active" value="{{$key->id}}" {{($key->active==1 ? 'checked' : '')}}>
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td class="buttons">
                            <a class="edit button" href="{{ route('newsletter.edit', ['language' => app()->getLocale(), 'id' => $key->id ])}}">{{__('admin.edit')}}</a>
                            <a class="delete button" href="{{ route('newsletter.destroy', ['language' => app()->getLocale(), 'id' => $key->id]) }}">{{__('admin.delete')}}</a>  
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="{{ __('admin.form.submit')}}">
        </form>
@endsection