<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
    <link rel="stylesheet" href="/css/add.css" />
</head>

<body class="">
    @include('admin.navbar')
    <div class="container">
        <form action="/processevent" method="post" enctype="multipart/form-data" class="">
            @csrf
            <label for="name">Event Name</label>
            <input type="text" name="name" id="">
            <br />
            <label for="name">Event Short Description</label>
            <input type="text" name="desc" id="">
            <br />
            <label for="name">Event Location</label>
            <input type="text" name="location" id="">
            <br />
            <label for="name">Event Date</label>
            <input type="text" name="date" id="" placeholder="e.g. 18 s/d 30 Agustus 2023">
            <br />
            <label for="img">Images</label>
            <input class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
            <br />
            <label for="link">Link Instagram Feed ["https/..."]</label>
            <input type="text" name="link">
            <br />
            <button type="submit">Add</button>
        </form>
    </div>
    <script>
    </script>
</body>

</html>