<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/adminschedule.css">k
    <title>Document</title>
</head>

<body>
    <h4>SCHEDULE</h4>
    <div class="schedule-container">
        <div class="schedule-title-roomdetails">
            <h5> Week of {{ $currentDateMD }}</h5>
        </div>
        <div class="schedule">

            <div class="left-column day-schedule">
                <p class="day-name">Time</p>
                @foreach($mon as $schedule)
                <p class="leftcolumn-time">{{ $schedule->time }}</p>
                @endforeach
            </div>

            @foreach(['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'] as $index =>
            $day)
            <div class="day-schedule">
                <p class="day-name">{{ ucfirst($day) }}</p>
                <div class="time-slots">
                    @foreach(${$day} as $schedule)
                    <div class="time-slot {{ $schedule->status == 'ready' ? 'ready' : ($schedule->status == 'booked' ? 'disabled' : 'expired') }}"
                        data-day="{{ $day }}" data-date="{{ $dates[$index] }}" data-time="{{ $schedule->time }}">
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>