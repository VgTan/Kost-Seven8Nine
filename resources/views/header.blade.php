<link rel="stylesheet" href="/css/header.css">
<link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

<body>
    <header>
        <div class="container">
            <input type="checkbox" name="" id="check">
            
            <div class="logo-container">
                <a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
            </div>

            <div class="nav-btn">
                <div class="nav-links">
                    <ul>
                        <li class="nav-link" style="--i: .6s">
                            <a href="/">Home</a>
                        </li>
                        <li class="nav-link" style="--i: .85s" id="dropdownfind"><a href="/">Find Room<i class="fas fa-caret-down"></i></a>
                            <div class="dropdown">
                                <ul>
                                    <li class="dropdown-link">
                                        <a href="#"><i class="ri-map-pin-line"></i>Anu kira"</a>
                                    </li>
                                    <div class="arrow"></div>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-link" style="--i: .6s">
                            <a href="/aboutus">About Us</a>
                        </li>
                        <li class="nav-link" style="--i: 1.35s">
                            <a href="/contactus">Contact Us</a>
                        </li>
                    </ul>
                </div>
                @auth
                <div class="log-sign" style="--i: 1.8s">
                    <a href="/profile" class="btn solid"><p class="">Profile</p>
                        <img src="/images/contact.png" alt=""></a>
                </div>
                @endauth
                @guest
                <div class="log-sign" style="--i: 1.8s">
                    <a href="/login" class="btn solid"><p class="">Login</p>
                        <img src="/images/contact.png" alt=""></a>
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
</body>
