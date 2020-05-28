@extends('admin.layout')

@section('content')
    <h1>{{ __('admin.addhomebanner') }}</h1>
    <form action="{{route('saveHomeBanner', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <p>{{$banner}}</p>
            <h2>Please select where your text should be:</h2>
            <p>Position:</p>
            <br>
            <input type="radio" id="left" name="position" value="l" checked="checked">
            <label for="left">Left</label><br>
            <input type="radio" id="right" name="position" value="r">
            <label for="right">Right</label><br>
        </div>

        <div>
            <h2>Please select what color your text should be:</h2>
            <div>
                <p for="left">Color: </p>
                <br>
                <input type="radio" id="bright" name="color" value="d" checked="checked">
                <label for="bright">bright</label><br>
                <input type="radio" id="dark" name="color" value="b">
                <label for="dark">dark</label><br>
            </div>
        </div>

        <div>
            <h2>English:</h2>
            <label for="title_en">English title</label>
            <input type="text" name="title_en">
            <label for="text_en">English text</label>
            <p>Always use &lt;p&gt; tags for a new paragraph, close it with &lt;/p&gt;</p>
            <textarea name="text_en"><p></p></textarea>
        </div>
        
        <p>Dutch:</p>
        <label for="title_nl">Dutch title</label>
        <input type="text" name="title_nl">
        <label for="text_nl">Dutch text</label>
        <textarea name="text_nl"><p></p></textarea>
        <br>
        <br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" required>
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
@endsection