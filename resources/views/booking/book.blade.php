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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <div class="currentdate">
                <p class="timezone"> <i class="fa fa-globe" aria-hidden="true"></i> Indonesia(WIB) </p>
                <p> {{ $currentDateYM }} </p>
                <p> <i class="fa fa-calendar-check-o" aria-hidden="true"> </i> Current Date </p>
            </div>
            <div class="book-maincontainer">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                            role="tab" aria-controls="nav-home" aria-selected="true">This Week</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                            role="tab" aria-controls="nav-profile" aria-selected="false">Next Week</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                            {{ date('d', strtotime($dates1[$index])) }}
                                        </p>
                                        <div class="{{ strtolower($day) }}">
                                            @foreach(${$day} as $schedule)
                                            @if($schedule->status == 'ready' && $schedule->week =='week 1')
                                            <div class="checkbox-wrapper-16">
                                                <label class="checkbox-wrapper">
                                                    <!-- Hidden input for day -->
                                                    <!-- <input name="day[]" type="hidden" value="{{ $day }}"> -->
                                                    <input name="time[]" type="checkbox" class="checkbox-input"
                                                        value="{{ $day }} {{ $dates1[$index] }} {{ $schedule->time }}" />
                                                    <span class="checkbox-tile">
                                                        <span class="checkbox-label">{{ $schedule->time }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            @elseif($schedule->status == 'booked' && $schedule->week =='week 1')
                                            <div class="checkbox-wrapper-disabled">
                                                <label class="checkbox-wrapper">
                                                    <p class="checkbox-input disabled" value="{{ $schedule->time }}"
                                                        disabled>
                                                    </p>
                                                    <span class="checkbox-tile">
                                                        <span class="checkbox-label">{{ $schedule->time }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            @elseif($schedule->status == 'expired' && $schedule->week =='week 1')
                                            <div class="checkbox-wrapper-expired">
                                                <label class="checkbox-wrapper">
                                                    <p class="checkbox-input expired" value="{{ $schedule->time }}"
                                                        disabled>
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
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                            {{ date('d', strtotime($dates2[$index])) }}
                                        </p>
                                        <div class="{{ strtolower($day) }}">
                                            @foreach(${$day} as $schedule)
                                            @if($schedule->status == 'ready' && $schedule->week == 'week 2')
                                            <div class="checkbox-wrapper-16">
                                                <label class="checkbox-wrapper">
                                                    <!-- Hidden input for day -->
                                                    <!-- <input name="day[]" type="hidden" value="{{ $day }}"> -->
                                                    <input name="time[]" type="checkbox" class="checkbox-input"
                                                        value="{{ $day }} {{ $dates2[$index] }} {{ $schedule->time }}" />
                                                    <span class="checkbox-tile">
                                                        <span class="checkbox-label">{{ $schedule->time }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            @elseif($schedule->status == 'booked' && $schedule->week =='week 2')
                                            <div class="checkbox-wrapper-disabled">
                                                <label class="checkbox-wrapper">
                                                    <p class="checkbox-input disabled" value="{{ $schedule->time }}"
                                                        disabled>
                                                    </p>
                                                    <span class="checkbox-tile">
                                                        <span class="checkbox-label">{{ $schedule->time }}</span>
                                                    </span>
                                                </label>
                                            </div>
                                            @elseif(($schedule->status == 'expired' && $schedule->week =='week 2'))
                                            <div class="checkbox-wrapper-expired">
                                                <label class="checkbox-wrapper">
                                                    <p class="checkbox-input expired" value="{{ $schedule->time }}"
                                                        disabled>
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
            </div>
        </div>
        <div class="book-margin-info">
            <div class="book-userinfo">
                <div class="userinfo-name">
                    <img src="/images/contact.png" alt="">
                    <p>{{ $user->name }}</p>
                </div>
                <div class="userinfo-token">
                    <h2>Booking Room</h2>
                    <p> <i class="fa fa-clock-o" aria-hidden="true"></i> Duration (30 Minutes/Token)
                    <p>{{ $user->token }} Token(s)</p>
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
    @include('footer')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
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

</body>

</html>