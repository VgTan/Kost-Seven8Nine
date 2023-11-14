<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rhapsodie.co</title>
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
    <div class="header-container">
        <div class="header">
            <div class="name">
                <a href="#" class="logo"><img src="./images/logo.png" alt=""></a>
            </div>
            <div class="header-content">
                <div class="content-box active">
                    <a class="" active href="#">Home</a>
                </div>
                <div class="content-box">
                    <select name="" id="" class="header-select">
                        <option value="">Find Kost</option>
                    </select>
                </div>
                <div class="content-box">
                    <a class="" href="#">Facilities</a>
                </div>
                <div class="content-box">
                    <a class="" href="#">Contacts</a>
                </div>
            </div>
            @guest
            <div class="header-button">
                <a class="sign-button" href="/login">
                    <p class="">Log In</p>
                    <img src="./images/contact.png" alt="">
                </a>
            </div>
            @endguest
            @auth
            <div class="header-button">
                <a class="sign-button" href="/logout">
                    <p class="">Log Out</p>
                    <!-- <img src="./images/contact.png" alt=""> -->
                </a>
            </div>
            @endauth
        </div>
    </div>

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
                    <p>Finding the Best Music Teachers &<br />Schools For You</p>
                </div>

                <!-- SEARCH ABSOLUTE START -->
                <div class="container-abs">
                    <div class="">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="book-tab" data-bs-toggle="tab"
                                    data-bs-target="#book" type="button" role="tab" aria-controls="book"
                                    aria-selected="true">BOOK KOST</button>
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
                            <img src="../images/basura.jpg">
                        </div>
                        <div class="aboutus-row-desc">
                            <div class="aboutus-desc-title">
                                <h5>ABOUT US</h5>
                                <h1>Rhapsodie.co
                                    <span>Music Space</span>
                                </h1>
                            </div>
                            <p>Rhapsodie.co Music Space is a brand new concept inIndonesian music industry.
                                It is a place where everyone canlearn music in public area (in this occasion is Mall)
                                and turnsmusic activity inclusively to everyone. This activity is apushing forward to
                                develop
                                children's growth with music byproviding a place to learn individually or with
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- ABOUT US LP END -->


            <!-- BRANCH START -->
            <div class="branch">
                <div class="branch-title">
                    <h1>OUR LOCATION</h1>
                    <h3>Book Your Lesson Now</h3>
                </div>
                <div class="branch-wrapper">
                    <div class="branch-card">
                        <div class="branch-img">
                            <img src="../images/basura.jpg">
                            <h1>Mall Bassura</h1>
                        </div>
                        <div class="branch-text">
                            <p>Visit the music space at Mall Bassura, where aspiring musicians can immerse themselves
                                in the world of melody.</p>
                        </div>
                        <div class="read-more">Read More</div>
                    </div>
                    <div class="branch-card">
                        <div class="branch-img"><img src="../images/aeon.jpg">
                            <h1>Aeon Mall JGC</h1>
                        </div>
                        <div class="branch-text">
                            <p>Explore the musical wonders at Aeon Mall JGC, where a vibrant music academy invites
                                enthusiasts to discover the joy of playing musical instruments.</p>
                        </div>
                        <div class="read-more">Read More</div>
                    </div>
                    <div class="branch-card">
                        <div class="branch-img"><img src="../images/lippo.jpg">
                            <h1>MaxxBox Lippo Village</h1>
                        </div>
                        <div class="branch-text">
                            <p>Unleash your musical potential at MaxxBox Lippo Village, where a dedicated music center
                                offers a dynamic environment for learning and mastering various instruments.</p>
                        </div>
                        <div class="read-more">Read More</div>
                    </div>
                </div>
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
                            <li><button class="price-btn">Learn More</button></li>
                        </ul>
                    </div>
                    <div class="card active">
                        <ul class="price-ul">
                            <li class="pack">BASIC 1</li>
                            <li class="price bottom-bar">IDR 75.000</li>
                            <li class="bottom-bar">30 Mins</li>
                            <li class="bottom-bar">Access To Every Rhapsodie.co Location</li>
                            <li><button class="price-btn active-btn">Learn More</button></li>
                        </ul>
                    </div>
                    <div class="card shadow">
                        <ul class="price-ul">
                            <li class="pack">BASIC 3</li>
                            <li class="price bottom-bar">IDR 450.000</li>
                            <li class="bottom-bar">180 Mins</li>
                            <li class="bottom-bar">Access To Every Rhapsodie.co Location</li>
                            <li><button class="price-btn">Learn More</button></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- PRICE PLAN END -->


            <!-- INSTAGRAM START -->
            <div class="contact-us">
                <div class="contact-content">
                    <img class="logo-sub" src="./images/logo.png" alt="">
                    <p class="subs">Subscribe & <br /> get news and top kosts</p>
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
    @include('footer');

    <script>
    var count = 0;
    var inc = 0;
    var margin = 0;
    var slider = document.getElementsByClassName("slider-width")[0];
    var itemDisplay = 0;
    if (screen.width > 990) {
        itemDisplay = document.getElementsByClassName("slider-container")[0].getAttribute("item-display-d");
        margin = itemDisplay * 13.5;
    }
    if (screen.width > 700 && screen.width < 990) {
        itemDisplay = document.getElementsByClassName("slider-container")[0].getAttribute("item-display-t");
        margin = itemDisplay * 10.3;
    }
    if (screen.width > 280 && screen.width < 700) {
        itemDisplay = document.getElementsByClassName("slider-container")[0].getAttribute("item-display-m");
        margin = itemDisplay * 20;
    }

    var item = document.getElementsByClassName("item");
    var itemleft = item.length % itemDisplay;
    var itemSlide = Math.floor(item.length / itemDisplay) - 1;
    for (let i = 0; i < item.length; i++) {
        item[i].style.width = (screen.width / itemDisplay) - margin + "px";
    }

    function next() {
        if (inc !== itemSlide + itemleft) {
            if (inc === itemSlide) {
                inc = inc + itemleft;
                count = count - (screen.width / itemDisplay) * itemleft;
            } else {
                inc++;
                count = count - screen.width;
            }
        }
        slider.style.left = count + "px";
    }

    function prev() {
        if (inc !== 0) {
            if (inc === itemleft) {
                inc = inc - itemleft;
                count = count + (screen.width / itemDisplay) * itemleft;
            } else {
                inc--;
                count = count + screen.width;
            }
        }
        slider.style.left = count + "px"
    }
    </script>

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