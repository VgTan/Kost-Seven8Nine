<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anu</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/app.css">
</head>

<body class="">
    <div class="header-container">
        <div class="header">
            <a href="#" class="name">traiHotels</a>
            <div class="header-content">
                <a class="" href="#">Home</a>
                <a class="" href="#">Hotels for sale</a>
                <select name="" id="" class="header-select">
                    <option value="">Products</option>
                </select>
                <a class="" href="#">Contacts</a>
            </div>
            <div class="header-button">
                <a class="sign-button" href="#">
                    <p class="">Sign In</p>
                    <img src="./images/contact.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="carousel-img" src="./images/building.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="carousel-img" src="./images/building.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="carousel-img" src="./images/building.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container-abs">
        <div class="">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">BUY HOTELS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                        type="button" role="tab" aria-controls="profile" aria-selected="false">TRAIDING</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                        type="button" role="tab" aria-controls="contact" aria-selected="false">FEATURED</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="" class="buy">
                        <div class="">
                            <p>Country</p>
                            <select name="" id="">
                                <option value="">Indonesia</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                        </div>
                        <div>
                            <p>City</p>
                            <select name="" id="">
                                <option value="">Tangerang</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                        </div>
                        <div>
                            <p>Property Type</p>
                            <select name="" id="">
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                        </div>
                        <div>
                            <p>Price</p>
                            <select name="" id="">
                                <option value="">Rp 100.000.000</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                        </div>
                        <button class="search-button" type="submit"><img src="./images/search.png" alt="">Search</button>
                    </form>
                </div>
                <div class="tab-pane " id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                <div class="tab-pane " id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
            </div>
        </div>
    </div>

    <div class="margin">
        <div class="main-container">
            <div class="places">
                <span class="list">| </span>
                <span class="new">New</span>
                <span>Hotels</span>
            </div>
            <div class="today-news">
                <span class="list">| </span>
                <span class="new">Today</span>
                <span>News</span>
            </div>
            <div class="services">
                <span class="list">| </span>
                <span class="new">Our</span>
                <span>Services</span>
                <div class="card-container">
                    <div class="card-margin">
                        <div class="card">
                            <img src="" alt="">
                            <p>Selling Hotels</p>
                        </div>
                        <div class="card">
                            <img src="" alt="">
                            <p>Hotel Investments</p>
                        </div>
                        <div class="card">
                            <img src="" alt="">
                            <p>Management Services</p>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>