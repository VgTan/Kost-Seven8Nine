<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font & Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="/css/roomdetail.css">
    <title>Rhapsodie</title>
</head>

<body>
    @include('header')
    <div class="roomdetail-margin">
        <div class="roomdetail-container">
            <div class="roomdetail-header">
                <img src="/images/{{ $loc->img }}" alt="">
            </div>
            <!-- variable CurrentTime itu data sekarang, jadi ngikut real time -->
            @php
            $currentDay = date('d');
            @endphp
            <div class="roomdetail-info">
                <div class="roomdetail-infodiv">
                    <div class="roomdetail-textinfo">
                        <h1>{{ $roomname }}, {{ $loc->name }}</h1>
                        <p>{{ $branchloc->location }}</p>
                        <p>
                            <i class="fa fa-arrows-alt" style="font-size:24px;margin-right:10px;color:#E6AD76"></i>
                            {{ $rooms->room_size }}
                        </p>
                        <p>
                            <i class="fa fa-check-square-o" style="font-size:24px;margin-right:10px;color:#E6AD76"></i>
                            {{ $rooms->room_equipment }}
                        </p>
                        <p>{{ $rooms->room_desc }}</p>
                    </div>
                    <div class="roomdetail-imginfo">
                        <img src="/images/{{ $rooms->img }}" alt="">
                    </div>
                </div>
                <iframe src="{{ $branchloc->location_map }}" frameborder="0"></iframe>
            </div>

            @if($schedule->isNotEmpty())
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
                    <input type="checkbox" class="" name="time[]" value="{{ $mon->time }}">{{ $mon->time }}
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
        </div>
    </div>

    @include('footer')
</body>

</html>