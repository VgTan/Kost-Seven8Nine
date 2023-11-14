<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/signlog.css">
</head>

<body>
    <main>
        <div class="header-container">
            <div class="header">
                <div class="name">
                    <a href="#" class="logo"><img src="./images/logo.png" alt=""></a>
                </div>
                <div class="header-content">
                    <div class="content-box">
                        <a class="" active href="/">Home</a>
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
                    <a class="sign-button" href="/login">
                        <p class="">Sign In</p>
                        <img src="./images/contact.png" alt="">
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="../images/loginimg.jpg" alt="login image" class="login-img">
                    <div class="imgtextoverlay">
                        <h1>Creating Kost Booking Easier</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore</p>
                    </div>
                </div>
                <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="../images/logokost.png" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Create an account!</h1>
                        <form action="{{ route('signup') }}" method="get">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="email@example.com">
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter your passsword">
                            </div>
                            <button type="submit" id="login" class="btn btn-block login-btn">SignUp</button>
                        </form>
                        <p class="login-wrapper-footer-text">Already have an account?
                            <a href="/login" class="regishere">Login here!</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>

</html>