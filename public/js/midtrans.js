// For example trigger on button clicked, or any time you need
var payButton = document.getElementById("pay-button");
payButton.addEventListener("click", function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token.
    // Also, use the embedId that you defined in the div above, here.
    window.snap.embed("{{ $snapToken }}", {
        embedId: "snap-container",
        onSuccess: function (result) {
            /* You may add your own implementation here */
            alert("payment success!");
            console.log(result);
        },
        onPending: function (result) {
            /* You may add your own implementation here */
            alert("wating your payment!");
            console.log(result);
        },
        onError: function (result) {
            /* You may add your own implementation here */
            alert("payment failed!");
            console.log(result);
        },
        onClose: function () {
            /* You may add your own implementation here */
            alert("you closed the popup without finishing the payment");
        },
    });
});
