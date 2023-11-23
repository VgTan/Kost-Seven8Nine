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
        </div>
    </div>

    @include('footer')
</body>

</html>