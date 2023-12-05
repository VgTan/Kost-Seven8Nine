<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile</title>
</head>

<body>
    @include('header')
    <div class="container container-profiles">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Transaction</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- PROFILE START -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="profile-container">
                    <div class="profile">
                        <section>
                            <p class="profile-header">Profile</p>
                            <div class="profile-pic">
                                <img class="img" src="./images/users/{{ $user->img }}" alt="">
                            </div>
                            <div class="profile-desc">
                                <div class="name-email">
                                    <div class="name">
                                        <p class="user-profile">{{ $user->name }} ({{ $user->gender }})</p>
                                    </div>
                                    <div class="address">
                                        <p class="user-profile">{{ $user->address }}</p>
                                    </div>
                                    <div class="email">
                                        <p class="user-profile">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="token">
                                    <div class="token-desc">
                                        <?php
                                        $min = $user->token * 30;
                                        ?>
                                        <p class="user-token">{{ $user->token }}</p>
                                        <p class="token-addition">Token(s)</p>
                                        <p class="token-min">( {{ $min }} min )</p>
                                    </div>
                                </div>
                                <div class="submit-button">
                                    <button class="open-button" onclick="openForm()">Upload New Avatar</button>
                                    <div class="form-popup" id="myForm">
                                        <form class="form-container" action="/profile-update" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="">
                                                <div class="form-desc">
                                                    <label for="images" class="drop-container" id="dropcontainer">
                                                        <span class="drop-title">Drop files here</span>
                                                        or
                                                        <input id="images" class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
                                                </div>
                                                <button class="btn" type="submit">Submit</button>
                                                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="line-container">
                        <div class="line"></div>
                    </div>
                    <div class="basic-info">
                        <div class="basic-container">
                            <form class="" action="/profile-update" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="header_info">
                                    <p>Basic Info</p>
                                </div>
                                <div class="profile-form" action="{{ route('edit_profile') }}">
                                    <div class="profile-desc-form">
                                        <div class="name-email">
                                            <div class="form-name">
                                                <label class="label-profile" for="name">Full Name</label><br />
                                                <input class="user-profile-edit" name="name" type="text">
                                            </div>
                                            <div class="form-address">
                                                <label class="label-profile" for="address">Address</label><br />
                                                <input class="user-profile-edit" name="address" type="text">
                                            </div>
                                            <div class="form-gender">
                                                <label class="label-profile" for="gender">Gender</label><br />
                                                <div class="input">
                                                    <input class="" name="gender" type="radio" value="M">Male
                                                    <input class="" name="gender" type="radio" value="F">Female
                                                    <input class="" name="gender" type="radio" value="none">Rather not
                                                    say
                                                </div>
                                            </div>
                                            <div class="form-email">
                                                <label class="label-profile" for="email">Email</label><br />
                                                <input class="user-profile" name="email" type="text" value="{{ $user->email }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tombols">
                                    <div class="info-btn">
                                        <button class="save" type="submit">Save Profile</button>
                                    </div>
                                    <div class="logout-button">
                                        <a href="/logout">Log Out</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PROFILE END -->

            <!-- SCHEDULE START -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @if(!$booklist->isEmpty())
                @foreach($booklist->unique('date') as $datedetail)
                <div class="schedule-date">
                    @foreach($booklist->where('date', $datedetail->date)->unique('branch') as $book)
                    <div class="course">
                        <div class="course-preview">
                            <h6>BOOKING SCHEDULE</h6>
                            <h2>{{ $book->branch }}</h2>
                            <h6>BOOK ON: {{ $datedetail->date }}</h6>
                        </div>
                        <div class="course-info">
                            <div class="progress-container">
                                <div class="progress"></div>
                                <button class="edit-button" onclick="edit_schedule(this)">Edit</button>
                                <button class="done-button hidden" onclick="done_schedule(this)">Done</button>
                            </div>
                            <form action="{{ route('remove_schedule') }}">
                                <input type="text" value="{{ $datedetail->date }}" name="date" hidden>
                                <input type="text" value="{{ $book->branch }}" name="branch" hidden>
                                @foreach($booklist->where('date', $datedetail->date)->where('branch',
                                $book->branch)->where('user_id', $user->id)->unique('room') as $detail)
                                <h6>{{ $detail->room }}</h6>
                                <input type="text" value="{{ $detail->room }}" name="room" hidden>

                                @foreach($booklist->where('date', $datedetail->date)->where('branch',
                                $book->branch)->where('user_id', $user->id)->where('room', $detail->room) as $room)
                                <div class="room-time">
                                    <h2 class="room-time-text">{{ $room->time }}</h2>
                                </div>
                                <div class="checkbox-input hidden">
                                    <input type="checkbox" value="{{ $room->id }}" name="id[]">
                                    <h2>{{ $room->time }}</h2>
                                </div>
                                @endforeach
                                @endforeach
                                <button type="submit" class="hidden remove-button">Remove</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endforeach
                @else
                <p>You haven't booked a room</p>
                @endif
            </div>


            <!-- SCHEDULE END -->

            <!-- TRANSACTION START -->

            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                @if(!$transactions->isEmpty())
                <div class="profile-container">
                    <table class="profile-table">
                        <tr class="profile-header-row">
                            <td class="profile-cell profile-date-cell">Date</td>
                            <td class="profile-cell profile-detail-cell">Amount</td>
                            <td class="profile-cell profile-status-cell">Payment Status</td>
                        </tr>
                        <form action="{{ route('buytoken') }}" method="POST">
                            @csrf
                            @foreach($transactions as $trans)
                            <tr class="profile-row">
                                <td class="profile-cell profile-date-cell" data-label="Job Id">
                                    {{ date_format($trans->created_at, 'M, d Y') }}
                                </td>
                                <input type="text" value="{{ $trans->id }}" name="id" hidden>
                                <input type="text" value="{{ $trans->bundle }}" name="bundle" hidden>
                                <input type="text" value="{{ $trans->price }}" name="price" hidden>
                                <td class="profile-cell profile-detail-cell" data-label="Customer Name">
                                    <div class="bundle">
                                        <p>{{ $trans->bundle }}</p>
                                        <p>{{ $trans->price }}</p>
                                    </div>
                                </td>
                                <td class="profile-cell profile-status-cell" data-label="Payment Status">
                                    @if($trans->status != 'Unpaid')
                                    @if($trans->status != 'Unpaid')
                                    {{ $trans->status }}
                                    @else
                                    @php
                                    $currentTime = now();
                                    $paymentTimeLimit = $trans->created_at->addHours(2);
                                    $timeRemaining = max(0, $paymentTimeLimit->diffInSeconds($currentTime));
                                    $hoursRemaining = floor($timeRemaining / 3600);
                                    $minutesRemaining = floor(($timeRemaining % 3600) / 60);
                                    $secondsRemaining = $timeRemaining % 60;
                                    @endphp

                                    @if($timeRemaining > 0)
                                    <div class="time-countdown">
                                        <div id="countdown">
                                            <p> {{ $trans->status }}</p>
                                            Time remaining: {{ $hoursRemaining }}h {{ $minutesRemaining }}m
                                            {{ $secondsRemaining }}s
                                        </div>
                                        <button type="submit">Pay</button>
                                    </div>
                                    <script>
                                        // JavaScript countdown
                                        setInterval(function() {
                                            var hours = {{ $hoursRemaining }};
                                            var minutes = {{ $minutesRemaining }};
                                            var seconds = {{ $secondsRemaining }};

                                            function updateCountdown() {
                                                if (hours === 0 && minutes === 0 && seconds === 0) {
                                                    clearInterval(countdownInterval);
                                                    // Optionally disable the button or take other actions when the countdown reaches zero
                                                } else {
                                                    if (seconds === 0) {
                                                        if (minutes === 0) {
                                                            hours--;
                                                            minutes = 59;
                                                        } else {
                                                            minutes--;
                                                        }
                                                        seconds = 59;
                                                    } else {
                                                        seconds--;
                                                    }

                                                    document.querySelector("#countdown").innerHTML = "Time remaining: " + hours + "h " + minutes + "m " + seconds + "s";
                                                }
                                            }

                                            var countdownInterval = setInterval(updateCountdown, 1000);
                                            updateCountdown(); // Initial update
                                        }, 1000);
                                    </script>
                                    @else
                                    @php
                                    $trans->delete();
                                    @endphp
                                    @endif
                                    @else
                                    @php
                                    $currentTime = now();
                                    $paymentTimeLimit = $trans->created_at->addHours(2);
                                    $timeRemaining = max(0, $paymentTimeLimit->diffInSeconds($currentTime));
                                    $hoursRemaining = floor($timeRemaining / 3600);
                                    $minutesRemaining = floor(($timeRemaining % 3600) / 60);
                                    $secondsRemaining = $timeRemaining % 60;
                                    @endphp

                                    @if($timeRemaining > 0)
                                    <div class="time-countdown">
                                        <div id="countdown">
                                            <p> {{ $trans->status }}</p>
                                            Time remaining: {{ $hoursRemaining }}h {{ $minutesRemaining }}m
                                            {{ $secondsRemaining }}s
                                        </div>
                                        <button type="submit">Pay</button>
                                    </div>
                                    <script>
                                        // JavaScript countdown
                                        setInterval(function() {
                                            var hours = {{ $hoursRemaining }};
                                            var minutes = {{ $minutesRemaining }};
                                            var seconds = {{ $secondsRemaining }};

                                            function updateCountdown() {
                                                if (hours === 0 && minutes === 0 && seconds === 0) {
                                                    clearInterval(countdownInterval);
                                                    // Optionally disable the button or take other actions when the countdown reaches zero
                                                } else {
                                                    if (seconds === 0) {
                                                        if (minutes === 0) {
                                                            hours--;
                                                            minutes = 59;
                                                        } else {
                                                            minutes--;
                                                        }
                                                        seconds = 59;
                                                    } else {
                                                        seconds--;
                                                    }

                                                    document.querySelector("#countdown").innerHTML = "Time remaining: " + hours + "h " + minutes + "m " + seconds + "s";
                                                }
                                            }

                                            var countdownInterval = setInterval(updateCountdown, 1000);
                                            updateCountdown(); // Initial update
                                        }, 1000);
                                    </script>
                                    @else
                                    @php
                                    $trans->delete();
                                    @endphp
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </form>

                    </table>
                </div>
                @else
                <div class="">No Transaction Available</div>
                @endif
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "flex";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        const dropContainer = document.getElementById("dropcontainer")
        const fileInput = document.getElementById("images")

        dropContainer.addEventListener("dragover", (e) => {
            // prevent default to allow drop
            e.preventDefault()
        }, false)

        dropContainer.addEventListener("dragenter", () => {
            dropContainer.classList.add("drag-active")
        })

        dropContainer.addEventListener("dragleave", () => {
            dropContainer.classList.remove("drag-active")
        })

        dropContainer.addEventListener("drop", (e) => {
            e.preventDefault()
            dropContainer.classList.remove("drag-active")
            fileInput.files = e.dataTransfer.files
        })

    function edit_schedule(button) {
        var container = button.closest(".course");
        var checkboxInput = container.querySelectorAll(".checkbox-input");
        var roomTime = container.querySelectorAll(".room-time");
        var doneBtn = container.querySelector(".done-button");
        var editBtn = container.querySelector(".edit-button");
        var removeBtn = container.querySelector(".remove-button");

        checkboxInput.forEach(function(input) {
            input.classList.remove("hidden");
            input.classList.add("edit-schedule");
        });

        roomTime.forEach(function(time) {
            time.classList.add("hidden");
        });

        doneBtn.classList.remove("hidden");
        editBtn.classList.add("hidden");
        removeBtn.classList.remove("hidden");
    }

    function done_schedule(button) {
        var container = button.closest(".course");
        var checkboxInput = container.querySelectorAll(".checkbox-input");
        var roomTime = container.querySelectorAll(".room-time");
        var doneBtn = container.querySelector(".done-button");
        var editBtn = container.querySelector(".edit-button");
        var removeBtn = container.querySelector(".remove-button");

        checkboxInput.forEach(function(input) {
            input.classList.add("hidden");
            input.classList.remove("edit-schedule");
        });

        roomTime.forEach(function(time) {
            time.classList.remove("hidden");
        });

        doneBtn.classList.add("hidden");
        editBtn.classList.remove("hidden");
        removeBtn.classList.add("hidden");
    }
    </script>
</body>

</html>