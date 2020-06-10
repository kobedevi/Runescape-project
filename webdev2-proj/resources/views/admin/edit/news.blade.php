@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.editnews') }}</h1>
    <form action="{{route('saveNewsAdmin', ['language' => app()->getLocale(), 'id' => $post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <h2>{{ __('admin.form.lang1') . ':' }}</h2>
            <div class="together">
                <label for="title_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.title') }}</label>
                <input maxlength = "80" type="text" name="title_en" placeholder="{{__('admin.form.title')}}" value="{{ old('title_en', ($post ? $post->title_en : '')) }}">
            </div>
            <div class="together">
                <label for="intro_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.intro') }}</label>
                <textarea name="intro_en">{{ old('intro_en', ($post ? $post->intro_en : '<p></p>')) }}</textarea>
            </div>
            <div class="together">
                <label for="text_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.text') }}</label>
                <textarea id="text_en" name="text_en">{{ old('text_en', ($post ? $post->text_en : '<p></p>')) }}</textarea>
            </div>
        </div>
        
        <div>
            <h2>{{ __('admin.form.lang2') . ':' }}</h2>
            <div class="together">
                <label for="title_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.title') }}</label>
                <input maxlength = "80" type="text" name="title_nl" placeholder="{{__('admin.form.title')}}" value="{{ old('title_nl', ($post ? $post->title_nl : '')) }}">
            </div>
            <div class="together">
                <label for="intro_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.intro') }}</label>
                <textarea name="intro_nl">{{ old('intro_nl', ($post ? $post->intro_nl : '<p></p>')) }}</textarea>
            </div>
            <div class="together">
                <label for="text_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.text') }}</label>
                <textarea name="text_nl">{{ old('text_nl', ($post ? $post->text_nl : '<p></p>')) }}</textarea>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.image') . ':'}}</h2>
            <div class="together">
                <label for="image">{{ __('admin.form.upload')}}</label>
                <input type="file" name="image" id="image">
            </div>
        </div>

        <input type="submit" value="{{ __('admin.form.submit')}}">
    </form>
@endsection