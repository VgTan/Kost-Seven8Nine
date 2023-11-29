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

                <p class="information">Location : {{ $branchname }}</p>


                @php
                $firstIteration = true; // Variable to track the first iteration
                @endphp

                @foreach($time as $times)
                @php
                list($day, $date, $time) = explode(' ', $times, 3);
                @endphp

                @if($firstIteration)
                <p class="information">{{ $day }} , {{ $date }}</p>
                <p class="information"> Time : </p>
                @php
                $firstIteration = false; // Set to false after the first iteration
                @endphp
                @endif

                <p class="information">{{ $time }}</p>
                @endforeach

                <div class="control">
                    <input type="text" hidden name="time[]" value="{{ $times }}">
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