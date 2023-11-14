<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/book.css">
    <title>Rhapsodie</title>
</head>

<body>
    @foreach($rooms as $room)
    <a class="" href="/{{$loc->site}}/{{$room->room}}">
        <p>{{ $room->room }}</p>
    </a>
    @endforeach
</body>

</html>