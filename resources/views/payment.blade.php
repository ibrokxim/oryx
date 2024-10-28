<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оплата</title>
    <script src="https://test-epay.homebank.kz/payform/payment-api.js"></script>
</head>
<body>
<button id="payButton">Оплатить</button>

<script>
    async function initiatePayment(invoiceId, amount) {
        try {
            const response = await fetch('/api/create-payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ invoiceId, amount })
            });
            const paymentObject = await response.json();

            halyk.pay(paymentObject);
        } catch (error) {
            console.error('Ошибка при инициализации платежа:', error);
        }
    }

    document.getElementById('payButton').addEventListener('click', () => {
        const invoiceId = '000000001';
        const amount = 10000; // Сумма оплаты
        initiatePayment(invoiceId, amount);
    });
</script>
</body>
</html>

