@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.add') . " API key" }}</h1>
    <form action="" method="POST">
        @csrf
        <div>
            <div class="together">
                <label for="key">API key</label>
                <input type="text" name="key" placeholder="8f02956952e7c12e2f2dcb9aqc2bee66-us10">
            </div>
            <div class="together">
                <label class="inputContainer">{{ __('admin.activeKey')}}
                    <input name="active" type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <input type="submit" value="{{ __('admin.form.submit')}}">
    </form>
@endsection