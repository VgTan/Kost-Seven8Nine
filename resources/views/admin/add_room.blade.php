<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
</head>

<body>


    <form action="/processroom" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Room Name</label>
        <input type="text" name="name" id="">
        <br/>
        <label for="branch_id">Place</label>
        <select name="branch_id" id="">
            <option value="">Choose</option>
            @foreach($branch as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
        <br/>
        <label for="size">Room Size</label>
        <input type="text" name="size" id="">
        <br/>
        <label for="size">Room Equipment</label>
        <input type="text" name="equipment" id="">
        <br/>
        <label for="size">Room Description</label>
        <input type="text" name="desc" id="">
        <br/>
        <label for="img">Images</label>
        <input class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
        <br/>
        <button type="submit">Add</button>
    </form>
</body>

</html>