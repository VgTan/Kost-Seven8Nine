<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="/images/{{ $roomimg }}" alt="">
    <p>{{ $branchname }}</p>
    <p>{{ $roomname }}</p>
    @foreach($time as $times)
    @php
    list($day, $date, $time) = explode(' ', $times, 3);
    @endphp

    <p>{{ $day }}</p>
    <p>{{ $date }}</p>
    <p>{{ $time }}</p>
    @endforeach
    
</body>
</html>