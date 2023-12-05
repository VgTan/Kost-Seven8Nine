<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
    <link rel="stylesheet" href="/css/addevent.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @include('admin.navbar')
    <div class="event_container">
        <div class="addevent">
            <h1>EDIT USER</h1>
        </div>
        <form action="/{{ $user->id }}/edit/process" method="post" class="">
            @csrf
            <div class="event_wrap">
                <div class="event_desc">
                    <img src="/images/users/{{ $user->img }}" alt="">
                </div>

                <div class="eventinfo">
                    <br />
                    <label for="name" class="in"><b>Name</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" id="" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="{{ $user->name }}" disabled>
                    </div>
                    <br />

                    <label for="desc" class="in"><b>Email</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="desc" id="" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="{{ $user->email }}" disabled>
                    </div>
                    <br />

                    <label for="location" class="in"><b>No Telp</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="location" id="" aria-label="Sizing example input"
                            placeholder="0812312732" aria-describedby="inputGroup-sizing-default"
                            value="{{ $user->address }}" disabled>
                    </div>
                    <br />

                    <label for="date" class="in"><b>Address</b></label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="date" id="" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="{{ $user->address }}" disabled>
                    </div>
                    <br />

                    <label for="token" class="in"><b>Token</b></label>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="token" id="" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default" value="{{ $user->token }}">
                    </div>
                    <br />
                    <div class="tombol">
                        <button type="submit" class="btn btn-outline-primary">DONE</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>