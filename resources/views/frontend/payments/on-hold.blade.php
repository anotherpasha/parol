<!DOCTYPE html>
<html>
<head>
    <title>On Hold</title>
</head>
<body>
    <h2>Thank you, but your payment is on-hold.</h2>
    @if($paymentChannel == 14)
        <p><strong>How to Pay at ALFA Group</strong></p>
        <ol>
            <li>Take note of your payment code and go to your nearest Alfamart, Alfa Midi, Alfa Express, Lawson or DAN+DAN store</li>
            <li>Tell the cashier that you wish to make a DOKU payment</li>
            <li>If the cashier is unaware of DOKU, provide the instruction to open the e-transaction terminal, choose "2", then "2", then "2" which will then display DOKU option</li>
            <li>The cashier will request for the payment code which you will provide {{ $paymentCode }}</li>
            <li>Make a payment to the cashier according to your transaction amount</li>
            <li>Get your receipt as a proof of payment. Your merchant will be directly notified of the payment status</li>
            <li>Done</li>
        </ol>

        <ol>
            <li>Catat kode pembayaran di atas dan datang ke gerai Alfamart, Alfa Midi, Alfa Express, Lawson atau DAN+DAN terdekat</li>
            <li>Beritahukan ke kasir bahwa anda ingin melakukan pembayaran DOKU</li>
            <li>Jika kasir tidak mengetahui mengenai pembayaran DOKU, informasikan ke kasir untuk membuka terminal e-transaction, pilih "2", lalu "2", lalu "2" yang akan menampilkan pilihan DOKU</li>
            <li>Kasir akan menanyakan kode pembayaran. Berikan kode pembayaran anda 8888800000000800. Kasir akan menginformasikan nominal yang harus dibayarkan</li>
            <li>Lakukan pembayaran ke kasir sejumlah nominal yang disebutkan. Pembayaran dapat menggunakan uang tunai atau non tunai. Non tunai antara lain Kartu Debit BCA, Kartu Debit BNI, BCA Flazz, BNI Prepaid dan Mandiri e-money</li>
            <li>Terima struk sebagai bukti pembayaran sudah sukses dilakukan. Notifikasi pembayaran akan langsung diterima oleh Merchant</li>
            <li>Selesai</li>
        </ol>
    @else
        <p><strong>How To Pay at The ATM</strong></p>
        <ol>
            <li>Enter PIN.</li>
            <li>Choose "Transfer". If using ATM BCA, choose "Others" then "Transfer"</li>
            <li>Choose "Other Bank Account"</li>
            <li>Enter the bank code (Permata is 013) followed by 16 digit payment code <strong class="red-text">{{ $paymentCode }}</strong> as the destination account, then choose "Correct"</li>
            <li>Enter the exact amount as your transaction value. Incorrect transfer amount will result in failed payment</li>
            <li>Confirm that the bank code, payment code, and transaction amount is correct, then choose "Correct"</li>
            <li>Done</li>
        </ol>
        <hr>
        <p><strong>How To Pay Using Internet Banking</strong></p>
        <p class="red-text">Note: Payment cannot be done using BCA Internet Banking (KlikBCA)</p>
        <ol>
            <li>Login to your internet banking account</li>
            <li>Choose "Transfer" and choose "Other Bank Account". Enter the bank code (Permata is 013) as the destination account</li>
            <li>Enter the exact amount as your transaction value</li>
            <li>Enter the destination amount using your 16 digit payment code <strong class="red-text">{{ $paymentCode }}</strong></li>
            <li>Confirm that the bank code, payment code, and transaction amount is correct, then choose "Correct"</li>
            <li>Done</li>
        </ol>
    @endif
</body>
</html>
