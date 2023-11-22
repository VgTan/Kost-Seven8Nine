<link rel="stylesheet" href="../css/header.css">
<div class="header-container">
    <div class="header">
        <div class="name">
            <a href="#" class="logo"><img src="/images/logo.png" alt=""></a>
        </div>
        <div class="header-content">
            <div class="content-box active">
                <a class="" active href="/">Home</a>
            </div>
            <div class="content-box">
                <select name="" id="" class="header-select">
                    <option value="">Find Kost</option>
                </select>
            </div>
            <div class="content-box">
                <a class="" href="/roomdetail">Facilities</a>
            </div>
            <div class="content-box">
                <a class="" href="#">Contacts</a>
            </div>
        </div>
        @guest
        <div class="header-button">
            <a class="sign-button" href="/login">
                <p class="">Login</p>
                <img src="/images/contact.png" alt="">
            </a>
        </div>
        @endguest
        @auth
        <div class="header-button">
            <a class="sign-button" href="/profile">
                <p class="">Profile</p>
                <img src="/images/contact.png" alt="">
            </a>
        </div>
        @endauth
    </div>
</div>