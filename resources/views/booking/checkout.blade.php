<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="/css/checkout.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="trans-container">
            <div class="title">Transaction Detail</div>
            <div class="info">
                <div class="">User Info</div>
                <div class="detail-info">
                    <div class="trans-detail">
                        <div class="name">
                            <p>Name: </p>
                            <p>
                                {{ $token->name }}
                            </p>
                        </div>
                        <div class="bundle">
                            <p>Bundle: </p>
                            <p>
                                {{ $token->bundle }}
                            </p>
                        </div>
                        <div class="bundle">
                            <p>Token: </p>
                            <p>
                                {{ $total_token }}
                            </p>
                        </div>
                        <div class="price">
                            <p>Price: </p>
                            <p>
                                Rp {{ $token->price }},00
                            </p>
                        </div>
                        <button id="pay-button">Pay</button>
                    </div>
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