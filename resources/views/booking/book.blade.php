<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/book.css">
    <title>Rhapsodie</title>
</head>

<body>

    @php
    $currentDay = date('d');
    @endphp
    <form class="schedule" action="{{ route('booking') }}" method="post">

        @csrf
        <input class="day" name="branch" type="text" value="{{ $loc->name }}">
        <input class="day" name="room" type="text" value="{{ $roomname }}">
        <div class="mon">
            <p>Monday</p>
            <input class="day" name="date" type="text" value="{{ $currentDay }}">
            @foreach($mon as $mon)
            @if($mon->status == 'ready')
            <input class="day" name="day" type="text" disabled value="{{ $mon->day }}">
            <input type="checkbox" class="time-slot" name="time[]" value="{{ $mon->time }}">{{ $mon->time }}
            
            @else
            <input class="day" name="day" type="text" disabled value="{{ $mon->day }}">
            <input type="checkbox" class="" name="time[]" value="{{ $mon->time }}" disabled>{{ $mon->time }}
            @endif
            @endforeach
        </div>
        <div class="tue">
            <p>Tuesday</p>
            <input class="day" name="date" type="text" value="{{ $currentDay + 1 }}">
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
            <input class="day" name="date" type="text" value="{{ $currentDay + 2}}">
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
        </ul>

        <button type="submit">Book</button>

    </form>
</body>

</html>