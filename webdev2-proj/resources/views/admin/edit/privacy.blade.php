@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.editprivacy') }}</h1>
    <form action="{{route('savePrivacy', ['language' => app()->getLocale()])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <h2>{{ __('admin.form.lang1') . ':' }}</h2>
            <div class="together">
                <label for="text_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.text') }}</label>
                <textarea name="text_en">{{ old('text_en', ($post ? $post->text_en : '')) }}</textarea>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.lang2') . ':' }}</h2>
            <div class="together">
                <label for="text_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.text') }}</label>
                <textarea name="text_nl">{{ old('text_nl', ($post ? $post->text_nl : '')) }}</textarea>
            </div>
        </div>

        <input type="submit" value="{{ __('admin.form.submit')}}">
    </form>
@endsection