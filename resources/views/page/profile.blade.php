<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/profile.css">
    <title>Profile</title>
</head>

<body>
    @include('header')
    <div class="container">
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
                                <form class="form-container" action="/profile-update" enctype="multipart/form-data"
                                    method="post">
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
                                        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
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
                                            <input class="" name="gender" type="radio" value="none">Rather not say
                                        </div>
                                    </div>
                                    <div class="form-email">
                                        <label class="label-profile" for="email">Email</label><br />
                                        <input class="user-profile" name="email" type="text" value="{{ $user->email }}"
                                            disabled>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="logout-button">
            <a href="/logout">Log Out</a>
        </div>
    </div>
    
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