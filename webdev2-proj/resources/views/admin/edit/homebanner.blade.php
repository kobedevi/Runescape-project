@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.edithomebanner') }}</h1>
    <form action="{{route('saveHomeBanner', ['language' => app()->getLocale(), 'id' => $banner->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <h2>{{ __('admin.form.textPos') . ':' }}</h2>
            <div>
                <p>{{ __('admin.form.pos') }}<span class="required">*</span></p>
                <input type="radio" id="left" name="position" value="l" {{ old('position', (($banner->position == 'l') ? 'checked' : '')) }}>
                <label for="left">{{ __('admin.form.pos1') }}</label><br>
                <input type="radio" id="right" name="position" value="r" {{ old('position', (($banner->position == 'r') ? 'checked' : '')) }}>
                <label for="right">{{ __('admin.form.pos2') }}</label><br>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.textCol') . ':' }}</h2>
            <div>
                <p for="left">{{ __('admin.form.col') }}<span class="required">*</span></p>
                <input type="radio" id="bright" name="color" value="d" {{ old('color', (($banner->color == 'd') ? 'checked' : '')) }}>
                <label for="bright">{{ __('admin.form.col1') }}</label><br>
                <input type="radio" id="dark" name="color" value="b" {{ old('position', (($banner->color == 'b') ? 'checked' : '')) }}>
                <label for="dark">{{ __('admin.form.col2') }}</label><br>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.lang1') . ':' }}</h2>
            <div class="together">
                <label for="title_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.title') }}</label>
                <input maxlength = "80" type="text" name="title_en" placeholder="{{__('admin.form.title')}}" value="{{ old('title_en', ($banner ? $banner->title_en : '')) }}">
            </div>
            <div class="together">
                <label for="text_en">{{ __('admin.form.lang1_1') .' '. __('admin.form.text') }}</label>
                <textarea name="text_en">{{ old('text_en', ($banner ? $banner->text_en : '<p></p>')) }}</textarea>
            </div>
        </div>
        
        <div>
            <h2>{{ __('admin.form.lang2') . ':' }}</h2>
            <div class="together">
                <label for="title_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.title') }}</label>
                <input maxlength = "80" type="text" name="title_nl" placeholder="{{__('admin.form.title')}}" value="{{ old('title_nl', ($banner ? $banner->title_nl : '')) }}">
            </div>
            <div class="together">
                <label for="text_nl">{{ __('admin.form.lang2_1') .' '. __('admin.form.text') }}</label>
                <textarea name="text_nl">{{ old('text_nl', ($banner ? $banner->text_nl : '<p></p>')) }}</textarea>
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