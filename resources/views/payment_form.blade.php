<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <!-- Include the test JS library -->
    <script src="https://test-epay.homebank.kz/payform/payment-api.js"></script>
</head>
<body>
<h1>Processing Payment</h1>

<script>
    // Function to create the payment object
    var createPaymentObject = function(auth, invoiceId, amount) {
        var paymentObject = {
            invoiceId: "{{ $paymentParams['invoiceId'] }}",
            invoiceIdAlt: "{{ $paymentParams['invoiceIdAlt'] }}",
            backLink: "{{ $paymentParams['backLink'] }}",
            failureBackLink: "{{ $paymentParams['failureBackLink'] }}",
            postLink: "{{ $paymentParams['postLink'] }}",
            failurePostLink: "{{ $paymentParams['failurePostLink'] }}",
            language: "{{ $paymentParams['language'] }}",
            description: "{{ $paymentParams['description'] }}",
            accountId: "{{ $paymentParams['accountId'] }}",
            terminal: "{{ $paymentParams['terminal'] }}",
            amount: "{{ $paymentParams['amount'] }}",
            currency: "{{ $paymentParams['currency'] }}",
            phone: "{{ $paymentParams['phone'] }}",
            name: "{{ $paymentParams['name'] }}",
            email: "{{ $paymentParams['email'] }}",
            data: "{{ $paymentParams['data'] }}",
        };
        paymentObject.auth = auth;
        return paymentObject;
    };

    // Call the payment method with the token and parameters
    halyk.pay(createPaymentObject({{ json_encode($paymentParams['auth']) }}, "{{ $paymentParams['invoiceId'] }}", "{{ $paymentParams['amount'] }}"));
</script>
</body>
</html>
