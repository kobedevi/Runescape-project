@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.edit') . " API key" }}</h1>
<form action="{{route('newsletter.save', ['language' => app()->getLocale(), 'id' => $key->id])}}" method="POST">
        @csrf
        <div>
            <div class="together">
                <label for="key">API key</label>
                <input type="text" name="key" value="{{ old('key', ($key ? $key->key : '')) }}"placeholder="8f02956952e7c12e2f2dcb9aqc2bee66-us10">
            </div>
            {{-- if newsletter is not active, give the possibility to set it to active --}}
            @if ($key->active == 0)
                <div class="together">
                    <label class="inputContainer"> {{ __('admin.activeKey')}}
                        <input name="active" type="checkbox" >
                        <span class="checkmark"></span>
                    </label>
                </div>    
            @endif
        </div>
        <input type="submit" value="{{ __('admin.form.submit')}}">
    </form>
@endsection