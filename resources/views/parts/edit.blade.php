<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Part</title>
</head>
<body>
    <form method="post" action="{{ route('parts.update', $part->id) }}">
        @method('PATCH')
        @csrf
    <label for="name">name:</label><br>
    <input type="text" id="name" name="name" value="{{$part->name}}"><br>
    <label for="other">other:</label><br>
    <input type="text" id="other" name="other" value="{{$part->other}}"><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
