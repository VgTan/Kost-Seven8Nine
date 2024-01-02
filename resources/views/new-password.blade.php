<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
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
                    <img src="../images/basura.jpg" alt="login image" class="login-img">
                    <div class="imgtextoverlay">
                        <h1>Rhapsodie.co Music Space</h1>
                        <p>a place where everyone can learn music in public area and turns music activity inclusively
                            to
                            everyone.</p>
                    </div>
                </div>
                <div class="col-sm-6 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="../images/logokost.png" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Reset Password</h1>
                        @if(Session::has('failed'))
                        <div class="alert alert-danger w-full">{{Session::get('failed')}}</div>
                        @endif
                        @if(Session::has('no'))
                        <div class="alert alert-danger w-full">{{Session::get('no')}}</div>
                        @endif
                        <form action="{{ route('reset.password.post')}}" method="post">
                            @csrf
                            <input type="text" name="token" hidden value="{{$token}}">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" value="{{old('email')}}">
                                <p class="text-danger absolute text-sm">@error('email') {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Enter New Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter your passsword">
                                <p class="text-danger absolute text-sm">@error('password') {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Enter your passsword">
                                <p class="text-danger absolute text-sm">@error('password') {{$message}}
                                    @enderror
                                </p>
                            </div>
                            <button name="login" id="login" class="btn btn-block login-btn" type="submit" value="Login">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>