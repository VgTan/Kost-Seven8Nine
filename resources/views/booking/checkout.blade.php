<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/checkout.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <title>Rhapsodie</title>
</head>

<body>
    <div class="container-anu">
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
                    <button class="btn" id="pay-button">Pay</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function() {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                /* You may add your own implementation here */
                window.location.href = '/profile'
                alert("payment success!");
                console.log(result);
            },
            onPending: function(result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function(result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function() {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
            }
        })
    });
    </script>
</body>

</html>