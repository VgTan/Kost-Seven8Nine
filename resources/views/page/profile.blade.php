<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profile.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Profile</title>
</head>

<body>
    @include('header')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Schedule</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact" aria-selected="false">Transaction</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <!-- PROFILE START -->
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="profile-container">
                    <div class="profile">
                        <section>
                            <p class="profile-header">Profile</p>
                            <div class="profile-pic">
                                <img class="img" src="./images/users/{{ $user->img }}" alt="">
                            </div>
                            <div class="profile-desc">
                                <div class="name-email">
                                    <div class="name">
                                        <p class="user-profile">{{ $user->name }} ({{ $user->gender }})</p>
                                    </div>
                                    <div class="address">
                                        <p class="user-profile">{{ $user->address }}</p>
                                    </div>
                                    <div class="email">
                                        <p class="user-profile">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="token">
                                    <div class="token-desc">
                                        <?php
                                $min = $user->token * 30;
                                ?>
                                        <p class="user-token">{{ $user->token }}</p>
                                        <p class="token-addition">Token(s)</p>
                                        <p class="token-min">( {{ $min }} min )</p>
                                    </div>
                                </div>
                                <div class="submit-button">
                                    <button class="open-button" onclick="openForm()">Upload New Avatar</button>
                                    <div class="form-popup" id="myForm">
                                        <form class="form-container" action="/profile-update"
                                            enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="">
                                                <div class="form-desc">
                                                    <label for="images" class="drop-container" id="dropcontainer">
                                                        <span class="drop-title">Drop files here</span>
                                                        or
                                                        <input id="images" class="" type="file" name="img"
                                                            accept=".jpg, .jpeg, .png" value="" multiple />
                                                </div>
                                                <button class="btn" type="submit">Submit</button>
                                                <button type="button" class="btn cancel"
                                                    onclick="closeForm()">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="line-container">
                        <div class="line"></div>
                    </div>
                    <div class="basic-info">
                        <div class="basic-container">
                            <form class="" action="/profile-update" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="header_info">
                                    <p>Basic Info</p>
                                    <div class="info-btn">
                                        <button class="save" type="submit">Save Profile</button>
                                    </div>
                                </div>
                                <div class="profile-form" action="{{ route('edit_profile') }}">
                                    <div class="profile-desc-form">
                                        <div class="name-email">
                                            <div class="form-name">
                                                <label class="label-profile" for="name">Full Name</label><br />
                                                <input class="user-profile-edit" name="name" type="text">
                                            </div>
                                            <div class="form-address">
                                                <label class="label-profile" for="address">Address</label><br />
                                                <input class="user-profile-edit" name="address" type="text">
                                            </div>
                                            <div class="form-gender">
                                                <label class="label-profile" for="gender">Gender</label><br />
                                                <div class="input">
                                                    <input class="" name="gender" type="radio" value="M">Male
                                                    <input class="" name="gender" type="radio" value="F">Female
                                                    <input class="" name="gender" type="radio" value="none">Rather not
                                                    say
                                                </div>
                                            </div>
                                            <div class="form-email">
                                                <label class="label-profile" for="email">Email</label><br />
                                                <input class="user-profile" name="email" type="text"
                                                    value="{{ $user->email }}" disabled>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- PROFILE END -->
            <!-- SCHEDULE START -->
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                @if(!$booklist->isEmpty())
                @foreach($booklist->unique('branch') as $book)
                <div class="book-containter">
                    <div class="book-header">
                        <p>{{ $book->branch }}</p>
                        @foreach($booklist->where('branch', $book->branch)->where('user_id', $user->id)->unique('date')
                        as $datedetail)
                        <div class="book-detail">
                            <div class="detail-date">
                                <p>{{ $datedetail->date }}</p>
                            </div>
                            @foreach($booklist->where('branch', $book->branch)->where('user_id',
                            $user->id)->unique('room') as $detail)
                            <div class="detail-room-time">
                                <p>{{ $detail->room }}</p>
                                @foreach($booklist->where('branch', $book->branch)->where('user_id',
                                $user->id)->where('room', $detail->room)->where('date', $datedetail->date) as $room)
                                <p>{{ $room->time }}</p>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                @else
                <p>You haven't book a room</p>
                @endif
            </div>
            <!-- SCHEDULE END -->
            <!-- TRANSACTION START -->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                @foreach($transactions as $trans)
                <div class="trans-container">
                    <p>{{ date_format($trans->created_at, 'M, d Y') }}</p>
                    <div class="trans-detail">
                        <div class="bundle">
                            <p>{{ $trans->bundle }}</p>
                            <p>{{ $trans->price }}</p>
                        </div>
                        <p>{{ $trans->status }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="logout-button">
            <a href="/logout">Log Out</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
    function openForm() {
        document.getElementById("myForm").style.display = "flex";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }

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