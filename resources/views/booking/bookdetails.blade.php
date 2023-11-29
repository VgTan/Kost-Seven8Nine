<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bookdetails.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Rhapsodie</title>
    <script src="https://kit.fontawesome.com/ba19abdbd6.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="{{ route('booking') }}" method="post">
        @csrf

        <div id="container">

            <div class="product-details">

                <h1>{{ $roomname }}</h1>

                <div class="bdlocation">
                    <div class="location-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <p class="information">Location : {{ $branchname }}</p>
                </div>

                @php
                $firstIteration = true; // Variable to track the first iteration
                @endphp

                @foreach($time as $times)
                @php
                list($day, $date, $time) = explode(' ', $times, 3);
                @endphp

                @if($firstIteration)
                <div class="bddate">
                    <div class="date-icon">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <p class="information"> Day, date : {{ $day }} , {{ $date }}</p>
                </div>
                <div class="bdclock">
                    <div class="clock-icon">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <p class="information"> Time : </p>
                </div>
                @php
                $firstIteration = false; // Set to false after the first iteration
                @endphp
                @endif
                <div class="bdtime">
                    <p class="information">{{ $time }}</p>
                </div>
                @endforeach

                <div class="control">
                    <input type="text" hidden name="time[]" value="{{ $times }}">
                    <input type="hidden" name="branchname" value="{{ $branchname }}">
                    <input type="hidden" name="roomname" value="{{ $roomname }}">
                    <button class="btn" type="submit">
                        <span class="price">{{ $token }}
                            <i class="fa-solid fa-coins"></i>
                        </span>
                        <span class="shopping-cart">
                            <i class="fa-solid fa-book-bookmark"></i>
                        </span>
                        <span class="buy">Book Now</span>
                    </button>
                </div>

            </div>

            <div class="product-image">

                <img src="/images/rooms/{{ $roomimg }}" alt="">


                <div class="info">
                    <h2> Description</h2>
                    <ul>
                        <li><strong>Bright and Clean </strong></li>
                        <li><strong>Tidy and Comfy </strong></li>
                        <li><strong>Soundproofing Wall </strong></li>
                        <li><strong>Spacious </strong></li>
                    </ul>
                </div>
            </div>

        </div>

</body>

</html>