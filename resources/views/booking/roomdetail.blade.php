<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font & Style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                    <p>Need a place to learn<br />Or place to teach?</p>
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
                            <h4>ROOM'S DESCRIPTION</h4>

                            <h3>{{ $rooms->room_desc }}</h3>
                        </div>
                        <div class="roomdetail-image">
                            <img src="/images/rooms/{{ $rooms->img }}" alt="">
                        </div>
                    </div>

                    <div class="roomdetail-info">
                        <div class="roomdetail-infodiv">
                            <div class="box">
                                <h1>Special Price</h1>
                                <h2>Start from 75K/30mins</h2>
                                <a href="/{{$loc->site}}/{{$rooms->room_id}}/book" class="book-button">Book Now</a>
                            </div>
                            <hr>
                            <h4>SCHEDULE</h4>
                            @if($schedule->isNotEmpty())
                            <div class="schedule">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Day</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Monday</td>
                                            <td>
                                                @foreach($mon as $mon)
                                                <input type="checkbox" class="time-checkbox"
                                                    value="{{ $mon->time }}">{{ $mon->time }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tuesday</td>
                                            <td>
                                                @foreach($tues as $tues)
                                                <input type="checkbox" class="time-checkbox"
                                                    value="{{ $tues->time }}">{{ $tues->time }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Wednesday</td>
                                            <td>
                                                @foreach($wed as $wed)
                                                <input type="checkbox" class="time-checkbox"
                                                    value="{{ $wed->time }}">{{ $wed->time }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Thursday</td>
                                            <td>
                                                @foreach($thur as $thur)
                                                <input type="checkbox" class="time-checkbox"
                                                    value="{{ $thur->time }}">{{ $thur->time }}
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Friday</td>
                                            <td>
                                                @foreach($fri as $fri)
                                                <input type="checkbox" class="time-checkbox"
                                                    value="{{ $fri->time }}">{{ $fri->time }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div>
                                <p>No Schedule</p>
                            </div>
                            @endif

                            <div class="">
                                <a href="/room/{{ $loc->site }}">Back</a>
                            </div>
                        </div>
                        <hr>
                        <h4>LOCATION</h4>
                        <iframe src="{{ $branchloc->location_map }}" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('footer')

</body>

</html>