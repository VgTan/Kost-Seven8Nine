<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/findroom.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <title>Rhapsodie</title>
</head>

<body>
    <div class="findroom-con">
        @if (!$branchroom->isEmpty())
        @foreach ($branchroom->unique('branch_name') as $branch)
        <div class="find-card">
            <div class="findtext">
                <h1>{{ $branch->branch_name }}</h1>
            </div>
        </div>

        @foreach ($branchroom->where('branch_name', $branch->branch_name) as $room)
        <div class="find-room-details">
            <div class="roomfind-details">
                <div class="card" style="width: 18rem;">
                    <img src="/images/rooms/{{ $room->img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card_name">{{ $room->room_type }}</h3>
                        <a href="/{{$branch->site}}/{{$room->room_id}}/details" class="card__button">Book Now</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
        @else
        <p>"{{ $request->room }}" not found</p>
    </div>
    @endif

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script> -->

</body>

</html>