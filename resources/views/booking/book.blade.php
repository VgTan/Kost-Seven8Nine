<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/book.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rhapsodie</title>
</head>

<body>
    @include('header')

    <div class="book-margin">
        <div class="book-margin-container">
            <div class="book-title">
                <h1> Start Booking </h1>
                <p> {{ $loc->name }}, {{ $roomname }} </p>
                <p> <i class="fa fa-exclamation-circle" aria-hidden="true" style="margin-right: 5px;"></i> You can book
                    again if you have enough tokens </p>
            </div>
            <div class="book-maincontainer">
                <div class="currentdate">
                    <p class="timezone"> <i class="fa fa-globe" aria-hidden="true"></i> Indonesia(WIB) </p>
                    <p> {{ $currentDateYM }} </p>
                    <p> <i class="fa fa-calendar-check-o" aria-hidden="true"> </i> Current Date </p>
                </div>
                <form class="" action="{{ route('bookdetail') }}" method="get" onsubmit="setDay()">
                    @csrf
                    <div class="schedule-container">
                        <div class="schedule">
                            <input class="day" name="branch" type="text" value="{{ $loc->name }}">
                            <input class="day" name="room" type="text" value="{{ $roomname }}">

                            @foreach(['mon', 'tues', 'wed', 'thur', 'fri', 'sat', 'sun'] as $index => $day)
                            <div class="day-schedule">
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
                                            <p class="checkbox-input disabled" value="{{ $schedule->time }}" disabled>
                                            </p>
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
                    </div>
                    <div class="button-book">
                        <a href="/{{$loc->site}}/{{$rooms->room_id}}/details" class="back-button">Back</a>
                        <button type="submit" class="book-button">Book</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="book-margin-info">
            <div class="book-userinfo">
                <div class="userinfo-name">
                    <img src="/images/contact.png" alt="">
                    <p>Alfonsus Vega</p>
                </div>
                <div class="userinfo-token">
                    <h2>Booking Room</h2>
                    <p> <i class="fa fa-clock-o" aria-hidden="true"></i> Duration (30 Minutes/Token)
                    <p>3 Token</p>
                    </p>
                </div>
            </div>
            <hr style="width:75%;float:right;">
            <div class="userinfo-howto">
                <h2>How to Book?</h2>
                <ul class="check-list">
                    <li>Buy tokens to unlock music rooms</li>
                    <li>Explore branches, choose your room</li>
                    <li>Select your desired time slot</li>
                    <li>Confirm your reservation</li>
                    <li>Immerse in the music room, create, and enjoy</li>
                </ul>
                <h3>And the fun continues—book again with your remaining tokens! </h3>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if(Session::has('message'))
    <script>
    // toastr.options = {
    //     "progressBar": true;
    // }
    toastr.success("{{ Session::get('message') }}")
    </script>
    @endif
    @include('footer')
</body>

</html>