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
    @if(!$edit)
    <div class="container">
        <div class="profile-container">
            <form class="profile-form" action="{{ route('edit_profile') }}">
                <div class="profile-pic">
                    <img class="img" src="./images/users/{{ $user->img }}" alt="">
                </div>
                <div class="profile-desc">
                    <div class="name-email">
                        <div class="name">
                            <label for="name">Full Name</label><br />
                            <input class="user-profile" name="username" type="text" value="{{ $user->name }}" disabled>
                        </div>
                        <div class="email">
                            <label for="name">Email</label><br />
                            <input class="user-profile" name="email" type="text" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                    <div class="submit-button">
                        <button class="edit-button" type="submit">Edit Profile</button>
                    </div>
                </div>
            </form>
            <div class="logout-button">
                <a href="/logout">Log Out</a>
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <form class="profile-container" action="/profile-update" enctype="multipart/form-data" method="post">
            @csrf
            <div class="profile-form" action="{{ route('edit_profile') }}">
                <div class="profile-pic">
                    <img class="img" src="./images/users/{{ $user->img }}" alt="">
                    <br />
                </div>
                <div class="profile-desc">
                    <div class="name-email">
                        <div class="name">
                            <label for="name">Full Name</label><br />
                            <input class="user-profile-edit" name="name" type="text" value="{{ $user->name }}">
                        </div>
                        <div class="email">
                            <label for="name">Email</label><br />
                            <input class="user-profile" name="email" type="text" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="input-img">
                            <label for="name">Picture</label><br />
                            <input class="" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit-button">
                <button class="save-button" type="submit">Save Profile</button>
            </div>
        </form>
    </div>
    <!-- <form class="container" action="/profile-update" enctype="multipart/form-data" method="post">
        @csrf
        <div class="profile-container">
            <div class="profile-form">
                <div class="profile-pic">
                    <div class="pic">
                        <img class="img" src="./images/users/{{ $user->img }}" alt="">
                        <br />
                        <input class="input-img" type="file" name="img" accept=".jpg, .jpeg, .png" value="" multiple />
                    </div>
                </div>
                <div class="profile-desc">
                    <div class="name-email">
                        <div class="name">
                            <label for="name">Full Name</label><br />
                            <input class="user-profile-edit" name="username" type="text" value="{{ $user->name }}">
                        </div>
                        <div class="email">
                            <label for="name">Email</label><br />
                            <input class="user-profile" name="email" type="text" value="{{ $user->email }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit">Save Profile</button>
        </div>
    </form> -->
    @endif

</body>

</html>