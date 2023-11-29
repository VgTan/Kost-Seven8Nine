<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font & Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="/css/roomdetail.css">
    <title>Rhapsodie</title>
</head>

<body>
    @include('header')
    <div class="roomdetail-margin">
        <div class="roomdetail-container">
            <div class="roomdetail-header1">
                <img src="/images/cabang/{{ $loc->img }}" alt="">

                <div class="text-title">
                    <h1>Need a place to learn<br />Or place to teach?</h1>
                </div>
            </div>
            <div class="roomdetail-header-margin">
                <div class="container-roomdetail-info">
                    <div class="roomdetail-header">
                        <div class="roomdetail-textinfo">
                            <h1>{{ $roomname }}, {{ $loc->name }}</h1>
                            <h2>{{ $branchloc->location }}</h2>

                            <div class="info-item">
                                <p>
                                    <i class="fa fa-arrows-alt"
                                        style="font-size:24px;margin-right:10px;color:#E6AD76"></i>
                                    {{ $rooms->room_size }}
                                </p>
                                <p>
                                    <i class="fa fa-check-square-o"
                                        style="font-size:24px;margin-right:10px;color:#E6AD76"></i>
                                    {{ $rooms->room_equipment }}
                                </p>
                                
                            </div>
                            <hr>
                            <ul class="nav nav-pills">
                                <li class="active"><a data-toggle="pill" href="#home">Description</a></li>
                                <li><a data-toggle="pill" href="#menu1"> <i class="fa fa-calendar-check-o" aria-hidden="true"></i> Schedule</a></li>
                            </ul>
                            <div class="tab-content-room">
                                <div id="home" class="tab-pane fade in active">
                                    <h4>ROOM'S DESCRIPTION</h4>
                                    <h3>{{ $rooms->room_desc }}</h3>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <h4>SCHEDULE</h4>
                                    <div class="schedule-container">
                                        <div class="schedule-title-roomdetails">
                                            <h5> Week of {{ $currentDateMD }}th </h5>
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
                                                    <div class="time-slot {{ $schedule->status == 'ready' ? 'booked' : 'disabled' }}"
                                                        data-day="{{ $day }}" data-date="{{ $dates[$index] }}"
                                                        data-time="{{ $schedule->time }}">
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="roomdetail-infolocation">
                                <div class="button-back">
                                    <a href="/room/{{ $loc->site }}">Back</a>
                                </div>
                                <hr>
                                <h4>LOCATION</h4>
                                <iframe src="{{ $branchloc->location_map }}" frameborder="0"></iframe>
                            </div>
                        </div>

                        <div class="roomdetail-image">
                            <img src="/images/rooms/{{ $rooms->img }}" alt="">
                            <div class="roomdetail-info">
                                <div class="roomdetail-infodiv">
                                    <div class="box">
                                        <h1>Special Price</h1>
                                        <h2>Start from 75K/30mins</h2>
                                        <a href="/{{$loc->site}}/{{$rooms->room_id}}/book" class="book-button">Book
                                            Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>

</html>