@extends('pengguna.layouts.main')
@section('content')
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row mt-5 mx-3 mb-3">
                <div class="col-md-8">
                    <button class="btn btn-primary" id="pay-button">Bayar</button>
                </div>

                <div class="col-md-4">
                    <div id="snap-container" class="w-full"></div>
                </div>
                <script type="text/javascript">
                    // For example trigger on button clicked, or any time you need
                    var payButton = document.getElementById('pay-button');
                    payButton.addEventListener('click', function() {
                        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
                        // Also, use the embedId that you defined in the div above, here.
                        window.snap.embed('{{ $snapToken }}', {
                            embedId: 'snap-container',
                            onSuccess: function(result) {
                                /* You may add your own implementation here */
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
                        });
                    });
                </script>
            </div>
        </div>
    </main>
@endsection
