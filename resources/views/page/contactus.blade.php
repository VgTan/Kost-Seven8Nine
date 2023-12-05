<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c32adfdcda.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/contactus.css">
</head>

<body>
    @Auth
    @php
    $user = App\Models\User::find(Auth::user()->id);
    @endphp
    @endauth

    @include('header')
    <div class="contactus-margin">
        <div class="container-contactus">
            <div class="contact-title">
                <h1>Contact Us</h1>
                <p>Any questions or remarks? Just write us a message!</p>
            </div>
            <div class="contact-box">
                <div class="contact-left">
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{ Session::get('success') }}</p>
                    </div>
                    @endif
                    <h3>Send Your Message</h3>
                    <form action="{{ route('contact') }}" method="post">
                        <div class="input-row">
                            @csrf
                            <div class="input-group">
                                <label for="">Name</label>
                                @if(isset($user))
                                <input type="text" placeholder="{{ $user->name }}" name="name" class="contact-input"
                                    disabled>
                                <input type="text" placeholder="{{ $user->name }}" name="name" value="{{ $user->name }}"
                                    class="contact-input" hidden>
                                @else
                                <input type="text" required placeholder="Enter your full name" name="name"
                                    class="contact-input">
                                @endif
                            </div>
                            <div class="input-group">
                                <label for="">Phone</label>
                                <input type="number" required placeholder="Enter your phone number" name="phone"
                                    class="contact-input">
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="">Email</label>
                                @if(isset($user))
                                <input type="email" placeholder="{{ $user->email }}" name="email" class="contact-input"
                                    disabled>
                                <input type="email" placeholder="{{ $user->email }}" name="email" class="contact-input"
                                    value="{{ $user->email }}" hidden>
                                @else
                                <input type="email" required placeholder="Enter your email" name="email"
                                    class="contact-input">
                                @endif
                            </div>
                            <div class="input-group">
                                <label for="">Subject</label>
                                <input type="text" required placeholder="Enter your subject" name="subject"
                                    class="contact-input">
                            </div>
                        </div>

                        <label for="">Message</label>
                        <textarea rows="5" placeholder="Your Message..." name="message"></textarea>
                        <button type="submit">Send</button>
                    </form>
                </div>
                <div class="contact-right">
                    <h3>Contact Information</h3>
                    <p>Feel free to reach us!</p>
                    <div class="container-contactus-second">
                        <div class="row-contactus">
                            <div class="contact-info">
                                
                                <div class="contact-info-item">
                                <a href="https://wa.me/6281381188625">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>

                                    <div class="contact-info-content">
                                        <h4>Phone</h4>
                                        <p>+62 813-8118-8625</p>
                                    </div>
                                </a>
                                </div>

                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>

                                    <div class="contact-info-content">
                                        <h4>Email</h4>
                                        <p>example@email.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper">
                            <a href="https://m.facebook.com/p/lumimusicspace-100088209488757/">
                                <div class="icon facebook">
                                    <div class="tooltip">
                                        Facebook
                                    </div>
                                    <span><i class="fab fa-facebook-f"></i></span>
                                </div>
                            </a>
                                <a href="https://www.instagram.com/rhapsodiemusicspace/">
                                <div class="icon instagram">
                                    <div class="tooltip">
                                        Instagram
                                    </div>
                                    <span><i class="fab fa-instagram"></i></span>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('footer')
</body>

</html>