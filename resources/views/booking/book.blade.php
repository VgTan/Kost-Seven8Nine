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
            
    
    @if($schedule->isNotEmpty())
    <form class="schedule" action="{{ route('booking') }}" method="post">
        @csrf
        <input class="day" name="branch" type="text"  value="{{ $loc->name }}">
        <input class="day" name="room" type="text"  value="{{ $roomname }}">
        <div class="mon">
            <p>Monday</p>
            @php
            $currentDay = date('d');
            @endphp
            <input class="day" name="date" type="text" value="{{ $currentDay }}">
            @foreach($mon as $mon)
            @if($mon->status == 'ready')
            <input class="day" name="day" type="text" disabled value="{{ $mon->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $mon->time }}">{{ $mon->time }}
            @else
            <input class="day" name="day" type="text" disabled value="{{ $mon->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $mon->time }}" disabled>{{ $mon->time }}
            @endif
            @endforeach
        </div>
        <div class="tue">
            <p>Tuesday</p>
            @foreach($tues as $tues)
            @if($tues->status == 'ready')
            <input class="day" name="day" type="text" disabled value="{{ $tues->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $tues->time }}">{{ $tues->time }}
            @else
            <input class="day" name="day" type="text" disabled value="{{ $tues->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $tues->time }}" disabled>{{ $tues->time }}
            @endif
            @endforeach
        </div>
        <div class="wed">
            <p>Wednesday</p>
            @foreach($wed as $wed)
            @if($wed->status == 'ready')
            <input class="day" name="day" type="text" disabled value="{{ $wed->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $wed->time }}">{{ $wed->time }}
            @else
            <input class="day" name="day" type="text" disabled value="{{ $wed->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $wed->time }}" disabled>{{ $wed->time }}
            @endif
            @endforeach
        </div>
        <div class="thur">
            <p>Thursday</p>
            @foreach($thur as $thur)
            @if($thur->status == 'ready')
            <input class="day" name="day" type="text" disabled value="{{ $thur->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $thur->time }}">{{ $thur->time }}
            @else
            <input class="day" name="day" type="text" disabled value="{{ $thur->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $thur->time }}" disabled>{{ $thur->time }}
            @endif
            @endforeach
        </div>
        <div class="fri">
            <p>Friday</p>
            @foreach($fri as $fri)
            @if($fri->status == 'ready')
            <input class="day" name="day" type="text" disabled value="{{ $fri->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $fri->time }}">{{ $fri->time }}
            @else
            <input class="day" name="day" type="text" disabled value="{{ $fri->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $fri->time }}" disabled>{{ $fri->time }}
            @endif
            @endforeach
        </div>
        <button type="submit">Book</button>
    </form>

    @else
    <p>{{ $loc->name }}</p>
    <p>{{ $roomname }}</p>
    <div class="">
        <p>No Schedule</p>
    </div>
    @endif
    <div class="">
        <a href="/room/{{ $loc->site }}">Back</a>
    </div>
</body>
</html>