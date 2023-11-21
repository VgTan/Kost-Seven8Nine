<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/book.css">
    <title>Rhapsodie</title>
</head>

<body>
    <p>{{ $loc->name }}</p>
    <p>{{ $roomname }}</p>
    @if($schedule->isNotEmpty())
    <select name="" id="">
        @foreach($schedule as $sche)
        <option class="" value="{{ $sche->time }}">{{ $sche->time }}</option>
        @endforeach
    </select>
    @else
    <div class="">
        <p>No Schedule</p>
    </div>
    @endif
    <div class="">
        <a href="/room/{{ $loc->site }}">Back</a>
    </div>
</body>

</html>