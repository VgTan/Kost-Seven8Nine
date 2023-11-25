<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
</head>

<body>
    <form action="{{ route('buytoken') }}" method="post" enctype="multipart/form-data"  >
        @csrf
        <input required type="radio" name="bundle" id="" value="basic1">Basic 1
        <input required type="radio" name="bundle" id="" value="basic2">Basic 2
        <input required type="radio" name="bundle" id="" value="basic3">Basic 3
        <input required type="radio" name="bundle" id="" value="flexi1">Flexi 1
        <input required type="radio" name="bundle" id="" value="flexi2">Flexi 2
        <input required type="radio" name="bundle" id="" value="flexi3">Flexi 3
        <input required type="radio" name="bundle" id="" value="flexi2">Flexi 4
        <input type="text" value="{{ $user->name }}" disabled>
        <input type="text" value="{{ $user->email }}" disabled>
        <input type="text" value="{{ $user->address }}" disabled>
        <img class="qrcode" src="" alt="">
        <input required id="images" class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
        <button type="submit">Buy</button>
    </form>
</body>

</html>