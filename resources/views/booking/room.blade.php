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
    @php
    $roomNames = \App\Models\Room::where('id', $room->room_id)->get();
    @endphp
    @foreach($roomNames as $item)
    <a class="" href="/{{$loc->site}}/{{$room->room_id}}">
        <p>{{ $item->name }}</p>
    </a>
    @endforeach
    @endforeach

<a href="/">Back</a>
</body>

</html>