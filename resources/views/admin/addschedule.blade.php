<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/adminschedule.css">
    <title>Rhapsodie</title>
</head>

<body>
    @include('admin.navbar')

    <div class="schedule-con">
        @foreach ($cabang->unique('branch_name') as $branch)
        <div class="schedule-card">
            <div class="scheduletext">
                <h1>{{ $branch->branch_name }}</h1>
            </div>
        </div>

        <div class="schedule-room-details">
            <div class="roomschedule-details">
                @foreach ($cabang->where('branch_name', $branch->branch_name) as $room)
                <div class="card">
                    <img src="/images/rooms/{{ $room->img }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h3 class="card_name">{{ $room->room_type }}</h3>
                        <a href="/{{ $branch->site }}/{{ $room->room_id }}/admin" class="card__button">Edit Schedule</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>


</body>

</html>