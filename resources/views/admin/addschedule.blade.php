<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
</head>

<body>

    <div class="branch-room-details">
        <div class="room-details">
            @foreach($rooms as $room)
            @php
            $roomNames = \App\Models\Room::where('id', $room->room_id)->get();
            @endphp

            @foreach($roomNames as $item)
            <a href="/{{$loc->site}}/{{$room->room_id}}/details">
                <div class="card" style="width: 18rem;">
                    <img src="/images/rooms/{{$room->img}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card__name">{{ $item->name }}</h3>
                        <a href="/{{$loc->site}}/{{$room->room_id}}/details" class="card__button">Book Now</a>
                    </div>
                </div>
            </a>
            @endforeach
            @endforeach
        </div>
    </div>
</body>

</html>