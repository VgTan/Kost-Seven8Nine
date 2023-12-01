<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="/css/token.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('header')

    <div class="token-container">
        <div class="wrapper">

            <h2>Token Payment</h2>
            <div class="title">
                <h4>Select a <span style="color: #E6AD76">Payment</span> method</h4>
            </div>

            <form action="{{ route('buytoken') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="radio" name="bundle" value="basic1" id="basic-1" class="radio-token">
                <input type="radio" name="bundle" value="basic2" id="basic-2" class="radio-token">
                <input type="radio" name="bundle" value="basic3" id="basic-3" class="radio-token">
                <input type="radio" name="bundle" value="flexi1" id="flexi-1" class="radio-token">
                <input type="radio" name="bundle" value="flexi2" id="flexi-2" class="radio-token">
                <input type="radio" name="bundle" value="flexi3" id="flexi-3" class="radio-token">
                <input type="radio" name="bundle" value="flexi4" id="flexi-4" class="radio-token">

                <div class="category">
                    <label for="basic-1" class="basic1token">
                        <div class="imgName">
                            <span class="name">Basic 1 <br> 30 Minutes <br> IDR 75.000</span>
                        </div>
                        <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </label>

                    <label for="basic-2" class="basic2token">
                        <div class="imgName">
                            <span class="name">Basic 2 <br> 60 Minutes <br> IDR 150.000</span>
                        </div>
                        <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </label>

                    <label for="basic-3" class="basic3token">
                        <div class="imgName">
                            <span class="name">Basic 3 <br> 180 Minutes <br> IDR 450.000</span>
                        </div>
                        <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </label>

                    <label for="flexi-1" class="flexi1token">
                        <div class="imgName">
                            <span class="name">Flexi 1 <br> 2 Hours <br> IDR 280.00</span>
                        </div>
                        <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </label>

                    <label for="flexi-2" class="flexi2token">
                        <div class="imgName">
                            <span class="name">Flexi 2 <br> 10 Hours <br> IDR 1.200.000</span>
                        </div>
                        <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </label>

                    <label for="flexi-3" class="flexi3token">
                        <div class="imgName">
                            <span class="name">Flexi 3 <br> 20 Hours <br> IDR 2.000.000</span>
                        </div>
                        <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </label>

                    <label for="flexi-4" class="flexi4token">
                        <div class="imgName">
                            <span class="name">Flexi 4 <br> 50 hours <br> IDR 4.000.000</span>
                        </div>
                        <span class="check"><i class="fa-solid fa-circle-check" style="color: #6064b6;"></i></span>
                    </label>
                </div>

                <!--Account Information Start-->
                <h2>Billing Information</h2>
                <h4>Account</h4>
                <div class="input_group">
                    <div class="input_box">
                        <input type="text" placeholder="Full Name" required class="name" value="{{ $user->name }}"
                            disabled>
                        <i class="fa fa-user icon"></i>
                    </div>
                </div>
                <div class="input_group">
                    <div class="input_box">
                        <input type="email" placeholder="Email Address" required class="name" value="{{ $user->email }}"
                            disabled>
                        <i class="fa fa-envelope icon"></i>
                    </div>
                </div>

                <div class="input_group">
                    <div class="input_box">
                        <input type="text" placeholder="Address" required class="name" value="{{ $user->address }}"
                            disabled>
                        <i class="fa fa-map-marker icon" aria-hidden="true"></i>
                    </div>
                </div>
                <!--Account Information End-->

                <div class="input_group">
                    <div class="input_box">
                        <!-- <p class="proof-input">Input Your Payment Proof</p> -->
                        
                        <button type="submit">NEXT</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    @include('footer')
</body>

</html>