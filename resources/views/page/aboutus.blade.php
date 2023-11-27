<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="./css/testaboutus.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>
<body>
    @include('header')

    <div class="about-container">
        <div class="heading-about">
            <h1>Now Everyone Can Learn Music</h1>
            <p>Embarking on a musical journey not only unveils the intricacies of melodic </br>
                craftsmanship but also enriches one's soul with the sublime resonance of artistic cadence.</p>
            @guest
            <a href="/signup" class="btn btn-light" style="font-weight: bold;">Create Account</a>
            @endguest
        </div>

        <div class="company-profile">
            <div class="comprof">
                <div class="titleprofile">
                    <h1 style="color:#268AC9">Company</h1>
                    <h1 style="color:#E6AD76; margin-left:10px">Profile</h1>
                </div>
                <h3>Rhapsodie.co Music Space is a brand new concept in Indonesian music industry. It is a place where
                    everyone can learn music in public area
                    (in this occasion is Mall) and turns music activity inclusively to everyone. This activity is a
                    pushing
                    forward to develop children's growth
                    with music by providing a place to learn individually or with professional. </h3>
                <h3>Rhapsodie.co Music Space is open for individual and professional rent.
                    This could help private music teachers to have a class in a public area near their place also their
                    students' as an on-site learning center.
                    This can be rent with hourly rent system and offer special prices for professionals to have classes.
                </h3>
                <h3>Rhapsodie.co Music Space helps the venue to get more
                    traffic of daily visitors because it's placed in Mall as the quarter of hangout activities for
                    family
                    and kids market.</h3>
            </div>
            <img src="images/aboutus/learnmusic.jpg" />
        </div>

        <div class="service what-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="about-info sec-padd text-center mb-5">
                            <div class="section-title">
                                <h2>Finding the Best Music Teachers & Schools For You</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="we-do-item">
                            <div class="we-icon">
                                <img src="images/aboutus/schedule.png">
                            </div>
                            <div class="we-desc">
                                <h4 class="we-title">Realtime Schedule</h4>
                                <P>Ease of choosing a book schedule according to your wishes.</p>
                            </div>
                        </div>
                    </div>
                    <div class=" col-md-3 col-sm-6 col-xs-12">
                        <div class="we-do-item">
                            <div class="we-icon">
                                <img src="images/aboutus/music.png">
                            </div>
                            <div class="we-desc">
                                <h4 class="we-title">
                                    Various Instruments</h4>
                                <P>Offer a diverse array of musical genres to cater to a wide range of preferences.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="we-do-item">
                            <div class="we-icon">
                                <img src="images/aboutus/location.png">
                            </div>
                            <div class="we-desc">
                                <h4 class="we-title">
                                    Private Rooms</h4>
                                <P>Discover the intimacy of our private small music rooms for a personalized musical retreat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="we-do-item">
                            <div class="we-icon">
                                <img src="images/aboutus/payment.png">
                            </div>
                            <div class="we-desc">
                                <h4 class="we-title">
                                    Various Easy Payment</h4>
                                <P>Select your preferred payment method and experience the effortless and straightforward process.</p>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>


        <div class="fun-facts">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12">
                        <div class="vc_custom_heading no_stripe text-center  d-md-block counter-head
	  text_align_left has_icon  mb-3">
                            <h4 style="font-size:31px;color:black;line-height:37px;text-align:center;font-weight:bold"
                                class="consulting-custom-title">Traffic Breakdown Annual Session</h4>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-6">
                        <div class="fun-facts-card">
                            <div class="content text-center">
                                <span class="counter" data-val="8832">5800</span>
                                <div class="counter-title">High-Traffic</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-6">
                        <div class="fun-facts-card">
                            <div class="content text-center">
                                <span class="counter" data-val="7488">5800</span>
                                <div class="counter-title">Medium-Traffic</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2  col-md-2 col-sm-4 col-6">
                        <div class="fun-facts-card">
                            <div class="content text-center">
                                <span class="counter" data-val="6144">5800</span>
                                <div class="counter-title">Low-Traffic</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('footer')

    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

    <script>
    let valueDisplays = document.querySelectorAll(".counter");
    let interval = 10000;
    valueDisplays.forEach((valueDisplay) => {
        let startValue = 5800;
        let endValue = parseInt(valueDisplay.getAttribute("data-val"));
        let duration = Math.floor(interval / endValue);
        let counter = setInterval(function() {
            startValue += 1;
            valueDisplay.textContent = startValue;
            if (startValue == endValue) {
                clearInterval(counter);
            }
        }, duration);
    });
    </script>

</body>

</html>