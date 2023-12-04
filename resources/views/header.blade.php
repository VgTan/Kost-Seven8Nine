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

<header>
    <div class="container-header">
        <input type="checkbox" name="" id="check-header">

        <div class="logo-container">
            <a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
        </div>

        <div class="nav-btn button-header">
            <div class="nav-links">
                <ul>
                    <li class="nav-link nav-link-header" style="--i: .6s">
                        <a href="/">Home</a>
                    </li>
                    <li class="nav-link nav-link-header" style="--i: .6s">
                        <a href="/aboutus">About Us</a>
                    </li>
                    <li class="nav-link nav-link-header" style="--i: 1.35s">
                        <a href="/contactus">Contact Us</a>
                    </li>
                </ul>
            </div>
            @auth
            <div class="log-sign" style="--i: 1.8s">
                <form class="search-container" action="{{ route('findroom', ['room' => ':room']) }}" method="GET">
                    <div class="search-wrapper">
                        <i class="ri-search-line"></i>
                        <input class="searchInput" type="text" name="room" placeholder="Search Room/Branch">
                    </div>
                </form>

                <a href="/profile" class="btn btn-header solid">
                    <p class="">Profile</p>
                    <img src="/images/contact.png" alt="">
                </a>
            </div>
            @endauth
            @guest
            <div class="log-sign" style="--i: 1.8s">
                <form class="search-container" action="{{ route('findroom', ['room' => ':room']) }}" method="GET">
                    <div class="search-wrapper">
                        <i class="ri-search-line"></i>
                        <input class="searchInput" type="text" name="room" placeholder="Search Room/Branch">
                    </div>
                </form>

                <a href="/login" class="btn btn-header solid">
                    <p class="">Login</p>
                    <img src="/images/contact.png" alt="">
                </a>
            </div>
            @endguest
        </div>

        <div class="hamburger-menu-container">
            <div class="hamburger-menu">
                <div></div>
            </div>
        </div>
    </div>
</header>

</html>