<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/forgotpass.css">
</head>

<body>
    <main>
        @include('header')
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 login-section-wrapper">
                    <div class="login-wrapper my-auto">
                        @if(session()->has('Success'))
                        <div class="alert alert-success w-full">{{ session('Success') }}</div>
                        @endif

                        @if(session()->has('error'))
                        <div class="alert alert-danger w-full">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('forget.password.post')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email" style="font-size: 30px;">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" value="{{old('email')}}">
                                <p class="text-danger absolute text-sm">@error('email') {{$message}}
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