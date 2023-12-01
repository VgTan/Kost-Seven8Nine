<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts & Style-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&family=Heebo&family=Lora:ital,wght@0,500;1,400&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'>
    <!-- CSS -->
    <link rel="stylesheet" href="../css/room.css">
    <title>Rhapsodie</title>
</head>

<body>
    @include('header')

    <div class="branch-section">
        <div class="base-branch">
            <div class="heading-branch">
                <div class="branch-text">
                    <h1>{{ $loc->name }}</h1>
                    <p>{{ $loc->branch_desc }}</p>
                </div>
                <div class="branch-image">
                    <div class="image">
                        <img src="/images/cabang/{{ $loc->img }}" class="image" />
                    </div>
                    <div class="image1">
                        <img src="/images/cabang/{{ $loc->img1 }}" class="image1" />
                    </div>
                </div>
            </div>
            <div class="heading-branch-room">
                <div class="branch-room-text">
                    <h1>LOCATION</h1>
                    <p>{{ $loc->location }}</p>
                </div>
            </div>

            <div class="design-card-branch">
                <div class="branch-card-text">
                    <h1>ROOM</h1>
                    <h1>TYPE</h1>
                </div>
            </div>

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

        </div>
    </div>

    @include('footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <script src="../../js/room.js"></script>
</body>

</html>