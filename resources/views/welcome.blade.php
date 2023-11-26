<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rhapsodie</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed&family=Heebo&family=Lora:ital,wght@0,500;1,400&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/app.css">
</head>

<body>
    
    @include('header')
    <div class="margin">
        <div class="main-container">
            <!-- CAROUSEL HEADING START -->
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

                <div class="text-title">
                    <p>Need a place to learn<br />Or place to teach?</p>
                </div>

                <!-- SEARCH ABSOLUTE START -->
                <div class="container-abs">
                    <div class="">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="book-tab" data-bs-toggle="tab"
                                    data-bs-target="#book" type="button" role="tab" aria-controls="book"
                                    aria-selected="true">BOOK MUSIC PLACE</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="search-tab" data-bs-toggle="tab" data-bs-target="#search"
                                    type="button" role="tab" aria-controls="search"
                                    aria-selected="false">SEARCH</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane show active" id="book" role="tabpanel" aria-labelledby="book-tab">
                                <form action="" class="buy">
                                    <div class="book-content">
                                        <div>
                                            <p>Area</p>
                                            <select name="" id="">
                                                <option value="">Allogio</option>
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
                                    </div>
                                    <button class="search-button" type="submit"><img src="./images/search.png"
                                            alt="">Search</button>
                                </form>
                            </div>
                            <div class="tab-pane " id="search" role="tabpanel" aria-labelledby="search-tab">...</div>
                            <div class="tab-pane " id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                        </div>
                    </div>
                </div>
                <!-- SEARCH ABSOLUTE END -->
            </div>
            <!-- CAROUSEL HEADING END -->


            <!-- ABOUT US LP START -->
            <div class="about-lp">
                <div class="aboutus-lp">
                    <div class="aboutus-row">
                        <div class="aboutus-img">
                            <img src="../images/aeon.jpg">
                        </div>
                        <div class="aboutus-row-desc">
                            <div class="aboutus-desc-title">
                                <h5>ABOUT US</h5>
                                <h1>Rhapsodie.co
                                    <span>Music Space</span>
                                </h1>
                            </div>
                            <p>Rhapsodie.co Music Space is a brand new concept in Indonesian music industry. It is a
                                place where everyone can learn music in public area (in this occasion is Mall) and turns
                                music activity inclusively to everyone. This activity is apushing forward to develop
                                children's growth with music by providing a place to learn individually or with
                                professional.</p>
                            <p>Rhapsodie.co Music Space helps the venue to get moretraffic of daily visitors because
                                it's placed in Mall as thequarter of hangout activities for family and kids market.</p>
                            <div class="aboutus-icons">
                                <div class="aboutus-row-icons">
                                    <div class="aboutus-icon-desc">
                                        <i class='fas fa-guitar' style='font-size:48px;color:#268AC9'></i>
                                        <h6>Qualified
                                            <small class="d-block" style="color:#E6AD76">Guitar Lesson</small>
                                        </h6>
                                    </div>
                                </div>
                                <div class="aboutus-row-icons">
                                    <div class="aboutus-icon-desc">
                                        <i class='fas fa-music' style='font-size:48px;color:#268AC9'></i>
                                        <h6>Incredible
                                            <small class="d-block" style="color:#E6AD76">Piano Lesson</small>
                                        </h6>
                                    </div>
                                </div>
                                <div class="aboutus-row-icons">
                                    <div class="aboutus-icon-desc">
                                        <i class='fas fa-microphone-alt' style='font-size:48px;color:#268AC9'></i>
                                        <h6>Exciting
                                            <small class="d-block" style="color:#E6AD76">Vocal Lesson</small>
                                        </h6>
                                    </div>
                                </div>
                                <div class="aboutus-row-icons">
                                    <div class="aboutus-icon-desc">
                                        <i class='fas fa-drum' style='font-size:48px;color:#268AC9'></i>
                                        <h6>Amazing
                                            <small class="d-block" style="color:#E6AD76">Drum Lesson</small>
                                        </h6>
                                    </div>
                                </div>
                                <div class="aboutus-row-icons">
                                    <div class="aboutus-icon-desc">
                                        <i class='fas fa-headphones' style='font-size:48px;color:#268AC9'></i>
                                        <h6>Much More
                                            <small class="d-block" style="color:#E6AD76">Exciting Lessons</small>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <a class="aboutus-button" href="/aboutus">
                                <p>See More</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ABOUT US LP END -->


            <!-- BRANCH START -->
            <div class="branch">
                <div class="branch-title">
                    <h1>OUR LOCATION</h1>
                    <h3>Book Your Room Now</h3>
                </div>
                <div class="branch-wrapper">
                    @foreach ($room as $branch)
                    <div class="branch-card">
                        <div class="branch-img">
                            <img src="../images/cabang/{{ $branch->img }}">
                            <h1>{{ $branch->name }}</h1>
                        </div>
                        <div class="branch-text">
                            <p>{{ $branch->branch_desc }}</p>
                        </div>
                        <a class="read-more" href="/room/{{ $branch->site }}">Read More</a>
                    </div>
                    @endforeach
                </div>
                <!-- BRANCH END -->


                <!-- PRICE PLAN START -->
                <div class="priceplan">
                    <div class="priceplan-title">
                        <h1>OUR PRICE LIST</h1>
                        <h3>Make Time and Learn</h3>
                    </div>
                    <div class="price-cards">
                        <div class="card shadow">
                            <ul class="price-ul">
                                <li class="pack">BASIC 2</li>
                                <li class="price bottom-bar">IDR 150.000</li>
                                <li class="bottom-bar">60 Mins</li>
                                <li class="bottom-bar">Access To Every Rhapsodie.co Location</li>
                                <li><a href="/token" class="price-btn">Learn More</a></li>
                            </ul>
                        </div>
                        <div class="card active">
                            <ul class="price-ul">
                                <li class="pack">BASIC 1</li>
                                <li class="price bottom-bar">IDR 75.000</li>
                                <li class="bottom-bar">30 Mins</li>
                                <li class="bottom-bar">Access To Every Rhapsodie.co Location</li>
                                <li><a href="/token" class="price-btn active-btn">Learn More</a></li>
                            </ul>
                        </div>
                        <div class="card shadow">
                            <ul class="price-ul">
                                <li class="pack">BASIC 3</li>
                                <li class="price bottom-bar">IDR 450.000</li>
                                <li class="bottom-bar">180 Mins</li>
                                <li class="bottom-bar">Access To Every Rhapsodie.co Location</li>
                                <li><a href="/token" class="price-btn">Learn More</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- PRICE PLAN END -->


                <!-- INSTAGRAM START -->
                <div class="contact-us">
                    <div class="contact-content">
                        <img class="logo-sub" src="./images/logo.png" alt="">
                        <p class="subs">Subscribe & <br /> get news and top music places</p>
                        <p class="desc-sub">At the moment of subscribing you accept to be a VIP member of funhouse, you
                            will receive news
                            and valuable information
                        </p>
                        <form class="sub-form" action="">
                            <input type="text" placeholder="Enter your email">
                            <button class="btn-sub">Subscription</button>
                        </form>
                    </div>
                </div>
                <!-- INSTAGRAM END -->


            </div>
        </div>
    </div>

    @include('footer')

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