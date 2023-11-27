    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rhapsodie</title>
        <link rel="stylesheet" href="/css/add.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Pontano+Sans:wght@300&display=swap" rel="stylesheet">
    </head>

    <body>
        @include('admin.navbar')
        <div class="container">
            <form action="/processroom" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-container">
                    <input type="text" name="name" id="name" placeholder=" " required>
                    <label class="placeholder" for="name">Room Name</label>
                </div>
                <select name="branch_id" id="branch_id">
                    <option value="">Choose</option>
                    @foreach($branch as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                <label for="branch_id">Place</label>
                <div class="input-container">
                    <input type="text" name="size" id="size" placeholder=" " required>
                    <label class="placeholder" for="size">Room Size</label>
                </div>
                <div class="input-container">
                    <input type="text" name="equipment" id="equipment" placeholder=" " required>
                    <label class="placeholder" for="equipment">Room Equipment</label>
                </div>
                <div class="input-container">
                    <input type="text" name="desc" id="desc" placeholder=" " required>
                    <label class="placeholder" for="desc">Room Description</label>
                </div>
                <label for="img">Images</label>
                <input class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
                <br />
                <button type="submit">Add</button>
            </form>
        </div>
    </body>

    </html>