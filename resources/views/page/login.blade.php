 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Login</title>
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
                     <div class="login-wrapper my-auto">
                         @if(session()->has('success'))
                         <div class="alert alert-success w-full">{{ session('success') }}</div>
                         @endif

                         @if(session()->has('error'))
                         <div class="alert alert-danger w-full">{{ session('error') }}</div>
                         @endif
                         <h1 class="login-title">Welcome Back!</h1>
                         @if(Session::has('failed'))
                         <div class="alert alert-danger w-full">{{Session::get('failed')}}</div>
                         @endif
                         @if(Session::has('no'))
                         <div class="alert alert-danger w-full">{{Session::get('no')}}</div>
                         @endif
                         <form action="{{ route('login')}}" method="post">
                             @csrf
                             <div class="form-group">
                                 <label for="email">Email</label>
                                 <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com" value="{{old('email')}}">
                                 <p class="text-danger absolute text-sm">@error('email') {{$message}}
                                     @enderror
                                 </p>
                             </div>
                             <div class="form-group mb-4">
                                 <label for="password">Password</label>
                                 <input type="password" name="password" id="password" class="form-control" placeholder="Enter your passsword">
                                 <p class="text-danger absolute text-sm">@error('password') {{$message}}
                                     @enderror
                                 </p>
                             </div>
                             <button name="login" id="login" class="btn btn-block login-btn" type="submit" value="Login">Login</button>
                         </form>
                         <a href="{{route('forget.password')}}" class="forgot-password-link">Forgot password?</a>
                         <p class="login-wrapper-footer-text">Don't have an account?
                             <a href="/signup" class="regishere">Register here</a>
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