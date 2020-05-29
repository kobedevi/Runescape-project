@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.addnews') }}</h1>
    <form action="{{route('saveNewsAdmin', ['language' => app()->getLocale()])}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <h2>{{ __('admin.form.lang1') . ':' }}</h2>
            <div class="together">
                <label for="title_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.title') }}<span class="required">*</span></label>
                <input type="text" name="title_en" placeholder="{{__('admin.form.title')}}" required>
            </div>
            <div class="together">
                <label for="intro_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.intro') }}<span class="required">*</span></label>
                <textarea name="intro_en"></textarea>
            </div>
            <div class="together">
                <label for="text_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.text') }}<span class="required">*</span></label>
                <textarea name="text_en"></textarea>
            </div>
        </div>
        
        <div>
            <h2>{{ __('admin.form.lang2') . ':' }}</h2>
            <div class="together">
                <label for="title_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.title') }}<span class="required">*</span></label>
                <input type="text" name="title_nl" placeholder="{{__('admin.form.title')}}" required>
            </div>
            <div class="together">
                <label for="intro_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.intro') }}<span class="required">*</span></label>
                <textarea name="intro_nl"></textarea>
            </div>
            <div class="together">
                <label for="text_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.text') }}<span class="required">*</span></label>
                <textarea name="text_nl"></textarea>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.image') . ':'}}</h2>
            <div class="together">
                <label for="image">{{ __('admin.form.upload')}}<span class="required">*</span></label>
                <input type="file" name="image" id="image">
            </div>
        </div>

        <input type="submit" value="{{ __('admin.form.submit')}}">
    </form>
@endsection