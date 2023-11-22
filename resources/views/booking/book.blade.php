<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/book.css">
    <title>Rhapsodie</title>
</head>

<body>
    <p>{{ $loc->name }}</p>
    <p>{{ $roomname }}</p>
    @if($schedule->isNotEmpty())
    <div class="schedule">
        <div class="mon">
            <p>Monday</p>

            @foreach($mon as $mon)
            
            <input class="day" type="text" disabled value="{{ $mon->day }}">
            <input type="checkbox" class="" name="time" value="{{ $mon->time }}">{{ $mon->time }}
            @endforeach
        </div>
        <div class="tue">
            <p>Tuesday</p>
            @foreach($tues as $tues)
            <input type="checkbox" class="" value="{{ $tues->time }}">{{ $tues->time }}
            @endforeach
        </div>
        <div class="wed">
            <p>Wednesday</p>
            @foreach($wed as $wed)
            <input type="checkbox" class="" value="{{ $wed->time }}">{{ $wed->time }}
            @endforeach
        </div>
        <div class="thur">
            <p>Thursday</p>
            @foreach($thur as $thur)
            <input type="checkbox" class="" value="{{ $thur->time }}">{{ $thur->time }}
            @endforeach
        </div>
        <div class="fri">
            <p>Friday</p>
            @foreach($fri as $fri)
            <input type="checkbox" class="" value="{{ $fri->time }}">{{ $fri->time }}
            @endforeach
        </div>
    </div>
    @else
    <div class="">
        <p>No Schedule</p>
    </div>
    @endif
    <div class="">
        <a href="/room/{{ $loc->site }}">Back</a>
    </div>
</body>

</html>