<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&family=Heebo&family=Lora:ital,wght@0,500;1,400&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/room.css">
    <title>Rhapsodie</title>
</head>

<body>
    @include('header')
    <div class="room-margin">
        <div class="room-container">
            <div class="branch-room">
                <img src="/images/{{ $loc->img }}" alt="">
                <div class="text-title">
                    <p>{{ $loc->name }}</p>
                </div>
            </div>

            @foreach($rooms as $room)
            @php
            $roomNames = \App\Models\Room::where('id', $room->room_id)->get();
            @endphp

            @foreach($roomNames as $item)

            <div class="room-type-container">
                <div class="room-type">
                    <div class="room-image">
                        <a class="" href="/{{$loc->site}}/{{$room->room_id}}">
                            <img src="/images/{{$room->img}}" alt="Room Image">
                        </a>
                    </div>
                    <div class="room-details">
                        <h1>{{ $item->name }}</h1>
                        <div class="room-info">
                            <p>
                                <i class="fa fa-arrows-alt" style="font-size:24px;margin-right:10px;color:#E6AD76"></i>
                                <!-- Icon for room_size -->
                                {{ $room->room_size }}
                            </p>

                            <p>
                                <i class="fa fa-check-square-o" style="font-size:24px;margin-right:10px;color:#E6AD76"></i>
                                <!-- Icon for room_equipment -->
                                {{ $room->room_equipment }}
                            </p>
                        </div>
                        <div class="room-desc">
                            <p>{{ $room->room_desc }}</p>
                        </div>
                        <a class="book-button" href="/{{$loc->site}}/{{$room->room_id}}">Book Now</a>
                    </div>
                </div>
            </div>


            @endforeach
            @endforeach

        </div>
    </div>
</body>

</html>