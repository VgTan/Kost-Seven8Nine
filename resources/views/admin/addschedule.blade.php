<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
</head>

<body>


    <form action="/addscheds">
        @csrf
        <label for="cabang">Branch</label>
        <select name="cabang" id="">
            <option value="">Choose</option>
            @foreach($cabang as $cabang)
            <option value="{{ $cabang->id }}">{{ $cabang->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="rooms">Room:</label>
        <select name="room" id="">
            <option value="">Choose</option>
            @foreach($room as $room)
            <!-- <input type="checkbox" name="rooms" id="roomsCheckbox">{{ $room->room }} -->
            <option value="{{ $room->id }}"> {{ $room->name }}
                @endforeach
        </select>
        <br />
        <label for="time">Time</label>
        <br />
        <select name="day" id="">
            <option value="">Choose</option>
            <!-- <input type="checkbox" name="rooms" id="roomsCheckbox">{{ $room->room }} -->
            <option value="mon"> Monday
            <option value="tues"> Tuesday
            <option value="wed"> Wednesday
            <option value="thur"> Thursday
            <option value="fri"> Friday
        </select>
        <br/>
        <input type="date" name="date">
        <br />
        <input type="checkbox" name="time[]" id="" value="9.00 - 9.30">9.00 - 9.30
        <input type="checkbox" name="time[]" id="" value="9.30 - 10.00">9.30 - 10.00
        <input type="checkbox" name="time[]" id="" value="10.00 - 10.30">10.00 - 10.30
        <input type="checkbox" name="time[]" id="" value="10.30 - 11.00">10.30 - 11.00
        <br />
        <input type="checkbox" name="time[]" id="" value="11.00 - 11.30">11.00 - 11.30
        <input type="checkbox" name="time[]" id="" value="11.30 - 12.00">11.30 - 12.00
        <input type="checkbox" name="time[]" id="" value="12.00 - 12.30">12.00 - 12.30
        <input type="checkbox" name="time[]" id="" value="12.30 - 13.00">12.30 - 13.00
        <br />
        <input type="checkbox" name="time[]" id="" value="13.00 - 13.30">13.00 - 13.30
        <input type="checkbox" name="time[]" id="" value="13.30 - 14.00">13.30 - 14.00
        <input type="checkbox" name="time[]" id="" value="14.00 - 14.30">14.00 - 14.30
        <input type="checkbox" name="time[]" id="" value="14.30 - 15.00">14.30 - 15.00
        <br />
        <input type="checkbox" name="time[]" id="" value="15.00 - 15.30">15.00 - 15.30
        <input type="checkbox" name="time[]" id="" value="16.00 - 16.30">16.00 - 16.30
        <input type="checkbox" name="time[]" id="" value="16.30 - 17.00">16.30 - 17.00
        <br />
        <button type="submit">Add</button>
    </form>
</body>

</html>