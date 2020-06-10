@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.editpages') }}</h1>
    <form action="{{route('pages.save', ['language' => app()->getLocale(), 'id' => $post->id])}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <h2>{{ __('admin.form.lang1') . ':' }}</h2>
            <div class="together">
                <label for="title_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.title') }}</label>
                <input type="text" name="title_en" placeholder="{{__('admin.form.title')}}" value="{{ old('title_en', ($post ? $post->title_en : '')) }}">
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
                <input type="text" name="title_nl" placeholder="{{__('admin.form.title')}}" value="{{ old('title_nl', ($post ? $post->title_nl : '')) }}">
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
            <h2>{{ __('admin.form.publish') }}</h2>
            <div>
                <p>{{ __('admin.form.publish') }}<span class="required">*</span></p>
                <input type="radio" id="active0" name="active" value="0" {{ $post->active==0 ? 'checked' : ''}}>
                <label for="active0">{{ __('admin.form.publish1') }}</label><br>
                <input type="radio" id="active1" name="active" value="1" {{ $post->active==1 ? 'checked' : ''}}>
                <label for="active1">{{ __('admin.form.publish2') }}</label><br>
                {{-- give a "preview" link to page if page is active (possibility for user to easily grab the link and post in article) --}}
                @if($post->active==1)
                    <a class="preview" href="{{ route('pages.read', ['language' => app()->getLocale(), 'slug' => $post->{'slug_'.App::getLocale()}]) }}" target="_blank">Preview</a> 
                @endif
                </div>
        </div>

        <input type="submit" value="{{ __('admin.form.submit')}}">
    </form>
@endsection