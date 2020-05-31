@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.addhomebanner') }}</h1>
    <form action="{{route('saveHomeBanner', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <h2>{{ __('admin.form.textPos') . ':' }}</h2>
            <div>
                <p>{{ __('admin.form.pos') }}<span class="required">*</span></p>
                <input type="radio" id="left" name="position" value="l" checked="checked">
                <label for="left">{{ __('admin.form.pos1') }}</label><br>
                <input type="radio" id="right" name="position" value="r">
                <label for="right">{{ __('admin.form.pos2') }}</label><br>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.textCol') . ':' }}</h2>
            <div>
                <p for="left">{{ __('admin.form.col') }}<span class="required">*</span></p>
                <input type="radio" id="bright" name="color" value="d" checked="checked">
                <label for="bright">{{ __('admin.form.col1') }}</label><br>
                <input type="radio" id="dark" name="color" value="b">
                <label for="dark">{{ __('admin.form.col2') }}</label><br>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.lang1') . ':' }}</h2>
            <div class="together">
                <label for="title_en">{{ __('admin.form.lang1') .' '. __('admin.form.title') }}<span class="required">*</span></label>
            <input type="text" name="title_en" placeholder="{{__('admin.form.title')}}"required>
            </div>
            <div class="together">
                <label for="text_en">{{ __('admin.form.lang1') .' '. __('admin.form.text') }}<span class="required">*</span></label>
                <textarea name="text_en"><p></p></textarea>
            </div>
        </div>
        
        <div>
            <h2>{{ __('admin.form.lang2') . ':' }}</h2>
            <div class="together">
                <label for="title_nl">{{ __('admin.form.lang2') .' '. __('admin.form.title') }}<span class="required">*</span></label>
                <input type="text" name="title_nl" placeholder="{{__('admin.form.title')}}" required>
            </div>
            <div class="together">
                <label for="text_nl">{{ __('admin.form.lang2') .' '. __('admin.form.text') }}<span class="required">*</span></label>
                <textarea name="text_nl"><p></p></textarea>
            </div>
        </div>

        <div>
            <h2>{{ __('admin.form.image') . ':'}}</h2>
            <div class="together">
                <label for="image">{{ __('admin.form.upload')}}<span class="required">*</span></label>
                <input type="file" name="image" id="image" required>
            </div>
        </div>

        <input type="submit" value="{{ __('admin.add')}}">
    </form>
@endsection