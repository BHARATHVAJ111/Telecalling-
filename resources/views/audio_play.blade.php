<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if($audio->isEmpty())
    <p>No Audio</p>
@else
    @foreach($audio as $values)
        <audio controls>
            <source src="{{ asset('storage/' . $values->file_path) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    @endforeach
@endif


</body>
</html>