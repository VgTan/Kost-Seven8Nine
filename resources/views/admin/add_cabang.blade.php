<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
    <link rel="stylesheet" href="/css/addbranch.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @include('admin.navbar')

    <div class="container">
        <div class="addbranch">
            <h1>ADD BRANCH | UPLOAD FILES</h1>
            <form action="/processbranch" method="post" enctype="multipart/form-data" class="">
                @csrf
                <div class="dragger_wrap">
                    <div class="form-desc">
                        <label for="images" class="drop-container" id="dropcontainer">
                            <div class="icon"><i class="fa-solid fa-images"></i></div>
                            <span class="drop-title">Drop files here</span>
                            or
                            <input id="images" class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
                        </label>
                    </div>

                    <div class="branchinfo">
                        <br />
                        <label for="name" class="inp"><b>Place</b></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" id="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <br />

                        <label for="name" class="inp"><b>Location</b></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="location" id="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <br />

                        <label for="site" class="inp"><b>Site Name [".../(site name)"]</b></label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="site" id="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                        <br />

                        <button type="submit" class="btn btn-outline-primary">UPLOAD FILES</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const dropContainer = document.getElementById("dropcontainer")
        const fileInput = document.getElementById("images")

        dropContainer.addEventListener("dragover", (e) => {
            // prevent default to allow drop
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