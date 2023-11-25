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
    <form class="" action="{{ route('booking') }}" method="post">
        @csrf
        <div class="schedule">
            <input class="day" name="branch" type="text" value="{{ $loc->name }}">
            <input class="day" name="room" type="text" value="{{ $roomname }}">

            <div class="">
                <p class="day-name">Monday</p>
                <div class="mon">
                    <input class="day" name="date" type="text" value="{{ $currentDay }}">
                    @foreach($mon as $mon)
                    @if($mon->status == 'ready')
                    <input class="day" name="day" type="text" disabled value="{{ $mon->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $mon->time }}" />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $mon->time }}</span>
                            </span>
                        </label>
                    </div>
                    @else
                    <input class="day" name="day" type="text" disabled value="{{ $mon->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $mon->time }}" disabled />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $mon->time }}</span>
                            </span>
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="">
                <p class="day-name">Tuesday</p>
                <div class="tue">
                    <input class="day" name="date" type="text" value="{{ $currentDay + 1 }}">
                    @foreach($tues as $tues)
                    @if($tues->status == 'ready')
                    <input class="day" name="day" type="text" disabled value="{{ $tues->day }}">
                    <input class="day" name="day" type="text" disabled value="{{ $mon->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $tues->time }}" />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $tues->time }}</span>
                            </span>
                        </label>
                    </div>
                    @else
                    <input class="day" name="day" type="text" disabled value="{{ $tues->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $tues->time }}" disabled />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $tues->time }}</span>
                            </span>
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="">
                <p class="day-name">Wednesday</p>
                <div class="wed">
                    <input class="day" name="date" type="text" value="{{ $currentDay + 2}}">
                    @foreach($wed as $wed)
                    @if($wed->status == 'ready')
                    <input class="day" name="day" type="text" disabled value="{{ $wed->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $wed->time }}" />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $wed->time }}</span>
                            </span>
                        </label>
                    </div>
                    @else
                    <input class="day" name="day" type="text" disabled value="{{ $wed->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $wed->time }}" disabled />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $wed->time }}</span>
                            </span>
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="">
                <p class="day-name">Thursday</p>
                <div class="thur">
                    @foreach($thur as $thur)
                    @if($thur->status == 'ready')
                    <input class="day" name="day" type="text" disabled value="{{ $thur->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $thur->time }}" />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $thur->time }}</span>
                            </span>
                        </label>
                    </div>
                    @else
                    <input class="day" name="day" type="text" disabled value="{{ $thur->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $thur->time }}" disabled />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $thur->time }}</span>
                            </span>
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="">
                <p class="day-name">Friday</p>
                <div class="fri">
                    @foreach($fri as $fri)
                    @if($fri->status == 'ready')
                    <input class="day" name="day" type="text" disabled value="{{ $fri->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $fri->time }}" />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $fri->time }}</span>
                            </span>
                        </label>
                    </div>
                    @else
                    <input class="day" name="day" type="text" disabled value="{{ $fri->day }}">
                    <div class="checkbox-wrapper-16">
                        <label class="checkbox-wrapper">
                            <input type="checkbox" class="checkbox-input" value="{{ $fri->time }}" disabled />
                            <span class="checkbox-tile">
                                <span class="checkbox-label">{{ $fri->time }}</span>
                            </span>
                        </label>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <button type="submit">Book</button>
    </form>


</body>

</html>