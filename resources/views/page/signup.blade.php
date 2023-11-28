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
        @include('header')

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="../images/lippo.jpg" alt="login image" class="login-img">
                    <div class="imgtextoverlay">
                        <h1>Need a place to learn?</h1>
                        <p>Rhapsodie.co Music Space is a brand new concept in Indonesian music industry, makes music
                            activity inclusively to everyone. </p>
                    </div>
                </div>
                <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="../images/logokost.png" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Create an account!</h1>
                        @if(Session::has('success'))
                        <div class="alert alert-success w-full">{{Session::get('success')}}</div>
                        @endif
                        <form action="{{ route('signup') }}" method="get">
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter your name" value="{{old('name')}}">
                                <p class="text-danger absolute text-sm">@error('name') {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="email@example.com" value="{{old('email')}}">
                                <p class="text-danger absolute text-sm">@error('email') {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter your passsword">
                                    <p class="text-danger absolute text-sm">@error('password') {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Enter your Address">
                                    <p class="text-danger absolute text-sm">@error('address') {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label><br>
                                <div class="gender-choice">
                                    <input type="radio" name="gender" value="F" class="genderclass">
                                    <label for="female">Female
                                        <span class="checkmark"></span>
                                    </label>
                                    <input type="radio" name="gender" value="M" class="genderclass">
                                    <label for="male">Male
                                        <span class="checkmark"></span>
                                    </label>
                                    <input type="radio" name="gender" value="none" class="genderclass">
                                    <label for="none">Rather Not Say
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <p class="text-danger absolute text-sm">@error('gender') {{$message}}
                                    @enderror
                                </p>
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