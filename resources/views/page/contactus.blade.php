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
                                <input type="text" placeholder="{{ $user->name }}" name="name" disabled>
                                <input type="text" placeholder="{{ $user->name }}" name="name" value="{{ $user->name }}"
                                    hidden>
                                @else
                                <input type="text" required placeholder="Enter your full name" name="name">
                                @endif
                            </div>
                            <div class="input-group">
                                <label for="">Phone</label>
                                <input type="number" required placeholder="Enter your phone number" name="phone">
                            </div>
                        </div>
                        <div class="input-row">
                            <div class="input-group">
                                <label for="">Email</label>
                                @if(isset($user))
                                <input type="email" placeholder="{{ $user->email }}" name="email" disabled>
                                <input type="email" placeholder="{{ $user->email }}" name="email"
                                    value="{{ $user->email }}" hidden>
                                @else
                                <input type="email" required placeholder="Enter your email" name="email">
                                @endif
                            </div>
                            <div class="input-group">
                                <label for="">Subject</label>
                                <input type="text" required placeholder="Enter your subject" name="subject">
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
                                    <div class="contact-info-icon">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="color: #ffffff;"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h4>Address</h4>
                                        <p>4671 Sugar Camp Road,<br /> Owatonna, Minnesota, <br />55060</p>
                                    </div>
                                </div>

                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>

                                    <div class="contact-info-content">
                                        <h4>Phone</h4>
                                        <p>561-456-2321</p>
                                    </div>
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
                                <div class="icon facebook">
                                    <div class="tooltip">
                                        Facebook
                                    </div>
                                    <span><i class="fab fa-facebook-f"></i></span>
                                </div>
                                <div class="icon twitter">
                                    <div class="tooltip">
                                        Twitter
                                    </div>
                                    <span><i class="fab fa-twitter"></i></span>
                                </div>
                                <div class="icon instagram">
                                    <div class="tooltip">
                                        Instagram
                                    </div>
                                    <span><i class="fab fa-instagram"></i></span>
                                </div>
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