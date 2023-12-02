<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/findroom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Rhapsodie</title>
</head>

<body>
    @include('header')

    <div class="findroom-con">
        <div class="findroom-header1">
            <img src="/images/cabang/aeon.jpg" alt="">

            <div class="text-title">
                <h1>Find Your Perfect<br />Musical Private Room</h1>
            </div>
        </div>
        <div class="find-container">
            @if (!$branchroom->isEmpty())
            @foreach ($branchroom->unique('branch_name') as $branch)
            <div class="find-card">
                <div class="findtext">
                    <h1>{{ $branch->branch_name }}</h1>
                </div>
            </div>

            <div class="find-room-details">
                @foreach ($branchroom->where('branch_name', $branch->branch_name) as $room)
                <div class="room-card">
                    <div class="card">
                        <img src="/images/rooms/{{ $room->img }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card_name">{{ $room->room_type }}</h3>
                            <a href="/{{$branch->site}}/{{$room->room_id}}/details" class="card__button">Book Now</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>
        @else
        <h4>" {{ $request->room }} Not Found"</h4>
        @endif
    </div>

    @include('footer')
</body>

</html>