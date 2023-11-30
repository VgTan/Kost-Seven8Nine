<link rel="stylesheet" href="/css/header.css">
<div class="header-container" id="header">
    <div class="header">
        <div class="name">
            <a href="/" class="logo"><img src="/images/logo.png" alt=""></a>
        </div>
        <div class="header-content">
            <div class="content-box active">
                <a class="" active href="/">Home</a>
            </div>
            <div class="content-box">
                <select name="" id="" class="header-select">
                    <option value="">Find Room</option>
                </select>
            </div>
            <div class="content-box">
                <a class="" href="/aboutus">About Us</a>
            </div>
            <div class="content-box">
                <a class="" href="/contactus">Contact Us</a>
            </div>
        </div>
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
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
<script>
        window.addEventListener('scroll', function() {
            var header = document.getElementById('header');
            if (window.scrollY > 0) {
                header.classList.remove('header-container');
                header.classList.add('header-color');
            } else {
                header.classList.add('header-color');
                header.classList.remove('header-container');
            }
        });
    </script> -->