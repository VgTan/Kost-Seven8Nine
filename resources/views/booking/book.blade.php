<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/book.css">
    <title>Rhapsodie</title>
</head>

<body>
    <p> {{ $loc->name }} </p>
    <p> {{ $roomname }} </p>
    <form class="" action="{{ route('booking') }}" method="post" onsubmit="setDay()">
        @csrf
        <div class="schedule">
            <input class="day" name="branch" type="text" value="{{ $loc->name }}">
            <input class="day" name="room" type="text" value="{{ $roomname }}">

            @foreach(['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'] as $index => $day)
            <div class="">
                <p class="day-name">
                    @if(in_array($day, ['mon', 'tues', 'fri', 'sun']))
                    {{ ucfirst($day).'day' }}
                    @elseif($day == 'wed')
                    {{ ucfirst($day).'nesday' }}
                    @elseif($day == 'thur')
                    {{ ucfirst($day).'sday' }}
                    @elseif($day == 'sat')
                    {{ ucfirst($day).'urday' }}
                    @endif
                </p>
                <p class="day-number">
                    {{ date('d', strtotime($dates[$index])) }}
                </p>
                <div class="{{ strtolower($day) }}">
                    @foreach(${$day} as $schedule)
                    @if($schedule->status == 'ready')
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <!-- Hidden input for day -->
                            <!-- <input name="day[]" type="hidden" value="{{ $day }}"> -->
                            <input name="time[]" type="checkbox" class="checkbox-input"
                                value="{{ $day }} {{ $dates[$index] }} {{ $schedule->time }}" />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $schedule->time }}</span>
                            </span>
                        </label>
                    </div>
                    @else
                    <div class="checkbox-wrapper-disabled">
                        <label class="checkbox-wrapper">
                            <p class="checkbox-input disabled" value="{{ $schedule->time }}" disabled> </p>
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $schedule->time }}</span>
                            </span>
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <button type="submit">Book</button>
    </form>




</body>

</html>