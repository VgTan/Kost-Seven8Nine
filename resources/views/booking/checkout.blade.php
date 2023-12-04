<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/checkout.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhapsodie</title>
</head>

<body>
    <form class="container-anu" action="{{ route('callback') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" value="{{ $token->id }}" name="order_id" hidden>
        <div class="trans-container">
            <div class="music-space">
                <p>Rhapsodie.co Music Space</p>
            </div>
            <div class="title">
                <div class="receipt">
                    <p class="receipt-top">RECEIPT FOR</p>
                    <p class="name">{{ $token->name }}</p>
                </div>
                <div class="token-bundle">
                    <p>Rp {{ $token->price }}</p>
                </div>
            </div>
            <div class="info">
                <div class="detail-info">
                    <div class="trans-detail">
                        <div class="date-bundle">
                            <p class="date">DATE </p>
                            <p class="date-val">
                                {{ date_format($token->created_at, 'M, d Y') }}
                            </p>
                            <p class="bundle">BUNDLE </p>
                            <p class="bundle-val">
                                {{ $token->bundle }}
                            </p>
                        </div>
                        <div class="token-container">
                            <div class="token">
                                <p class="token">TOKEN </p>
                                <p class="token-count">
                                    {{ $total_token }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        <i class='bx bx-coin-stack'></i>
                        <p class="price-head">TOTAL </p>
                        <p class="total-price">
                            Rp {{ $token->price }},00
                        </p>
                    </div>
                    @if(!$paidToken)
                    <div class="no-rek">
                        <!-- <p>Rek. PT Lumi Musik Indonesia - Pusat</p> -->
                        <p>No. Rek: <label>761-580-7486</label></p>
                        <p>A/n PT Lumi Musik Indonesia</p>
                    </div>
                    <div class="input_box">
                        <p class="proof-input">PAYMENT PROOF</p>
                        <input required id="images" class="file-input" type="file" name="img" accept=".jpg, .jpeg, .png"
                            value="" multiple />
                    </div>
                    <button class="btn" type="submit" id="pay-button">Proceed</button>
                    @else
                    <div class="input_box">
                        <p class="proof-input">PAYMENT PROOF</p>
                        <input required id="images" class="file-input" type="file" name="img" accept=".jpg, .jpeg, .png"
                            multiple disabled />
                    </div>
                    <p class="button" type="submit" id="pay-button">PAID</p>
                    @endif
                </div>
            </div>
        </div>
    </form>

</body>

</html>