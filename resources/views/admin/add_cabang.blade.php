<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
</head>

<body>


    <form action="/processbranch" method="post" enctype="multipart/form-data">
        @csrf
        <label for="name">Place</label>
        <input type="text" name="name" id="">
        <br/>
        <label for="name">Location</label>
        <input type="text" name="location" id="">
        <br/>
        <label for="img">Images</label>
        <input class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
        <br/>
        <label for="site">Site Name [".../(site name)"]</label>
        <input type="text" name="site">
        <br/>
        <button type="submit">Add</button>
    </form>
</body>

</html>