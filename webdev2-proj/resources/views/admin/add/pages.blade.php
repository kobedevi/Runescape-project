@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.addpage') }}</h1>
    <form action="{{route('pages.save', ['language' => app()->getLocale()])}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <h2>{{ __('admin.form.lang1') . ':' }}</h2>
            <div class="together">
                <label for="title_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.title') }}</label>
                <input type="text" name="title_en" placeholder="{{__('admin.form.title')}}" value="{{ old('title_en') }}">
            </div>
            <div class="together">
                <label for="intro_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.intro') }}</label>
                <textarea name="intro_en">{{ old('intro_en') }}</textarea>
            </div>
            <div class="together">
                <label for="text_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.text') }}</label>
                <textarea id="text_en" name="text_en">{{ old('text_en') }}</textarea>
            </div>
        </div>
        
        <div>
            <h2>{{ __('admin.form.lang2') . ':' }}</h2>
            <div class="together">
                <label for="title_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.title') }}</label>
                <input type="text" name="title_nl" placeholder="{{__('admin.form.title')}}" value="{{ old('title_nl') }}">
            </div>
            <div class="together">
                <label for="intro_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.intro') }}</label>
                <textarea name="intro_nl">{{ old('intro_nl') }}</textarea>
            </div>
            <div class="together">
                <label for="text_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.text') }}</label>
                <textarea name="text_nl">{{ old('text_nl') }}</textarea>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.publish') }}</h2>
            <div>
                <p>{{ __('admin.form.publish') }}<span class="required">*</span></p>
                <input type="radio" id="active0" name="active" value="0" checked="checked">
                <label for="active0">{{ __('admin.form.publish1') }}</label><br>
                <input type="radio" id="active1" name="active" value="1">
                <label for="active1">{{ __('admin.form.publish2') }}</label><br>
            </div>
        </div>

        <input type="submit" value="{{ __('admin.form.submit')}}">
    </form>
@endsection