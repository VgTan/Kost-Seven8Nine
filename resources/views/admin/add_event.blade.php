<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
    <link rel="stylesheet" href="/css/addevent.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @include('admin.navbar')
    <div class="event_container">
        <div class="addevent">
            <h1>ADD EVENT | UPLOAD FILES</h1>
        </div>
        <form action="/processevent" method="post" enctype="multipart/form-data" class="">
            @csrf
            <div class="event_wrap">
                <div class="event_desc">
                    <label for="image" class="drop-event" id="dropevent">
                        <div class="icon2"><i class="fa-solid fa-images"></i></div>
                        <span class="drop-title2">Drop files here</span>
                        or
                        <input id="image" class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
                    </label>
                </div>

                <div class="eventinfo">
                    <br />
                    <label for="name" class="in"><b>Event Name</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" id="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br />

                    <label for="desc" class="in"><b>Event Short Description</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="desc" id="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br />

                    <label for="location" class="in"><b>Event Location</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="location" id="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br />

                    <label for="date" class="in"><b>Event Date</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="date" id="" placeholder="e.g. 18 s/d 30 Agustus 2023" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br />

                    <label for="link" class="in"><b>Link Instagram Feed ["https/..."]</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="link" id="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <br />
                    <div class="tombol">
                        <button type="submit" class="btn btn-outline-primary">UPLOAD FILES</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const dropContainer = document.getElementById("dropevent")
        const fileInput = document.getElementById("image")

        dropContainer.addEventListener("dragover", (e) => {
            e.preventDefault()
        }, false)

        dropContainer.addEventListener("dragenter", () => {
            dropContainer.classList.add("drag-active")
        })

        dropContainer.addEventListener("dragleave", () => {
            dropContainer.classList.remove("drag-active")
        })

        dropContainer.addEventListener("drop", (e) => {
            e.preventDefault()
            dropContainer.classList.remove("drag-active")
            fileInput.files = e.dataTransfer.files
        })
    </script>
</body>

</html>