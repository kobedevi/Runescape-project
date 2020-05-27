<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add homeBanner</title>
</head>
<body>
<form action="{{route('saveHomeBanner', app()->getLocale())}}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>Please select where your text should be:</p>
        <label for="left">Position: </label><br>
        <input type="radio" id="left" name="position" value="l" checked="checked">
        <label for="left">Left</label><br>
        <input type="radio" id="right" name="position" value="r">
        <label for="right">Right</label><br>

        <p>Please select if your image is dark or bright be:</p>
        <label for="left">Color: </label><br>
        <input type="radio" id="bright" name="color" value="b" checked="checked">
        <label for="bright">bright</label><br>
        <input type="radio" id="dark" name="color" value="d">
        <label for="dark">dark</label><br>

        <p>English:</p>
        <label for="title_en">English title</label>
        <input type="text" name="title_en">
        <label for="text_en">English text</label>
        <p>Always use &lt;p&gt; tags for a new paragraph, close it with &lt;/p&gt;</p>
        <textarea name="text_en">Some text?</textarea>
        
        <p>Dutch:</p>
        <label for="title_nl">Dutch title</label>
        <input type="text" name="title_nl">
        <label for="text_nl">Dutch text</label>
        <textarea name="text_nl">wat tekst?</textarea>
        <br>
        <br>
        <label for="image">Image</label>
        <input type="file" name="image" id="image" required>
        <br>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>