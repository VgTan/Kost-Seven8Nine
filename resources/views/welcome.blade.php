<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seven8Nine</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
            <div class="header-button">
                <a class="sign-button" href="#">
                    <p class="">Sign In</p>
                    <img src="./images/contact.png" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="margin">
        <div class="main-container">
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
                    <p>The Ease of Booking<br /> a Kost</p>
                </div>
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
            </div>
            <div class="detail-container">
                <div class="places">
                    <span class="list">| </span>
                    <span class="new">Find</span>
                    <span>Kost</span>
                    <div class="slider-container" item-display-d="4" item-display-t="3" item-display-m="1">
                        <div class="slider-width">
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                
                                            <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <img src="./images/logo.png" class="d-block w-100" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Some quick example text to build on the card title and make
                                            up the bulk of the
                                            card's content.</p>
                                        <a href="#" class="btn btn-primary">Show More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn" onClick="prev()">Prev</button>
                    <button type="button" class="btn" onClick="next()">Next</button>
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
    </div>
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