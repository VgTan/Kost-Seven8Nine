<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
</head>

<body>
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

    <!-- <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aboutus">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contactus">Contact Us</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> -->
</body>

</html>