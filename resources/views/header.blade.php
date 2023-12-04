<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
</head>

<body>
    <header>
        <div class="header-container">
            <div class="header">
                <div class="name">
                    <a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
                </div>
                <div class="header-content">
                    <div class="content-box active">
                        <a class="" active href="/">Home</a>
                    </div>
                    <div class="content-box">
                        <a class="" href="/aboutus">About Us</a>
                    </div>
                    <div class="content-box">
                        <a class="" href="/contactus">Contact Us</a>
                    </div>
                </div>
                <div class="head-end">
                    <form class="search-form" action="{{ route('findroom', ['room' => ':room']) }}" method="GET">
                        <input class="search" type="text" name="room" placeholder="Search Room/Branch">

                    </form>
                    @auth
                    <div class="header-button">
                        <a class="sign-button" href="/profile">
                            <p class="">Profile</p>
                            <img src="/images/contact.png" alt="">
                        </a>
                    </div>
                    @endauth
                    @guest
                    <div class="header-button">
                        <a class="sign-button" href="/login">
                            <p class="">Login</p>
                            <img src="/images/contact.png" alt="">
                        </a>
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    
</body>

</html>