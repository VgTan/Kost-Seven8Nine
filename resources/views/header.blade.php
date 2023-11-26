<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/header.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="d-flex align-items-center">
            <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
        </div>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Find Room</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/aboutus">About Us</a>
                </li>
                <li class="nav-item" style="margin-right: 35px;">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li>
                    <div class="header-button">
                        @guest
                        <a class="sign-button" href="/login">
                            <p class="">Login</p>
                            <img src="/images/contact.png" alt="">
                        </a>
                        @endguest
                        @auth
                        <a class="sign-button" href="/profile">
                            <p class="">Profile</p>
                            <img src="/images/contact.png" alt="">
                        </a>
                        @endauth
                    </div>
                </li>
            </ul>
        </div>

    </nav>
</body>

</html>