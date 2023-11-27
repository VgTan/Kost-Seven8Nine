<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('booking') }}" method="post">
        @csrf
        <img src="/images/{{ $roomimg }}" alt="">
        <input type="text" name="branch" value="{{ $branchname }}">
        <input type="text" name="room" value="{{ $roomname }}">

        @foreach($time as $times)
        @php
        list($day, $date, $time) = explode(' ', $times, 3);
        @endphp
        <p>{{ $day }}</p>
        <p>{{ $date }}</p>
        <p>{{ $time }}</p>
        
        <input type="text" hidden name="time[]" value="{{ $times }}">
        @endforeach
        <button type="submit">BOOK</button>
    </form>
</body>

</html>