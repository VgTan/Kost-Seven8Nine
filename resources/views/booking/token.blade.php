<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/token.css">
    <title>Rhapsodie</title>
</head>

<body>
    <div class="margin-token">
        <div class="token-container">
            <h1>Token Payment</h1>
            <form action="{{ route('buytoken') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Choose Your Pricing Plan</h2>
                <div class="wrapper-token">
                    <input required type="radio" name="bundle" id="basic-1" value="basic1">
                    <input required type="radio" name="bundle" id="basic-2" value="basic2">
                    <input required type="radio" name="bundle" id="basic-3" value="basic3">
                    <input required type="radio" name="bundle" id="flexi-1" value="flexi1">
                    <input required type="radio" name="bundle" id="flexi-2" value="flexi2">
                    <input required type="radio" name="bundle" id="flexi-3" value="flexi3">
                    <input required type="radio" name="bundle" id="flexi-4" value="flexi2">
                    <label for="basic-1" class="option basic-1">
                        <div class="dot"></div>
                        <span>
                            <p>Basic 1</p>
                            <p>30 Minutes</p>
                            <h1>IDR 75.000</h1>
                        </span>
                    </label>
                    <label for="basic-2" class="option basic-2">
                        <div class="dot"></div>
                        <span>
                            <p>Basic 2</p>
                            <p>60 Minutes</p>
                            <h1>IDR 150.000</h1>
                        </span>
                    </label>
                    <label for="basic-3" class="option basic-3">
                        <div class="dot"></div>
                        <span>
                            <p>Basic 3</p>
                            <p>180 Minutes</p>
                            <h1>IDR 450.000</h1>
                        </span>
                    </label>
                    <label for="flexi-1" class="option flexi-1">
                        <div class="dot"></div>
                        <span>
                            <p>Flexi 1</p>
                            <p>2 Hours</p>
                            <h1>IDR 280.000</h1>
                        </span>
                    </label>
                    <label for="flexi-2" class="option flexi-2">
                        <div class="dot"></div>
                        <span>
                            <p>Flexi 2</p>
                            <p>10 Hours</p>
                            <h1>IDR 1.200.000</h1>
                        </span>
                    </label>
                    <label for="flexi-3" class="option flexi-3">
                        <div class="dot"></div>
                        <span>
                            <p>Flexi 3</p>
                            <p>20 Hours</p>
                            <h1>IDR 2.000.000</h1>
                        </span>
                    </label>
                    <label for="flexi-4" class="option flexi-4">
                        <div class="dot"></div>
                        <span>
                            <p>Flexi 4</p>
                            <p>50 Hours</p>
                            <h1>IDR 4.000.000</h1>
                        </span>
                    </label>
                </div>
                <h2>Billing Info</h2>
                <div class="buyer">
                    <div class="buyer-info">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" class="" value="{{ $user->name }}" disabled></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" class="" value="{{ $user->email }}" disabled></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" class="" value="{{ $user->address }}" disabled></td>
                            </tr>
                        </table>
                    </div>
                    <div class="buy-proof">
                        <img class="qrcode" src="" alt="">
                        <input required id="images" class="file-input" type="file" name="img" accept=".jpg, .jpeg, .png"
                            value="" multiple />
                        <label for="images" class="upload-label">Choose File</label>
                        <button type="submit">Buy</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>