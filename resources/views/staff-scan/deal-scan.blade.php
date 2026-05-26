@extends('common.index')

@section('content')

<style>
    body {
        background: #f3c623;
        font-family: Arial;
        text-align: center;
    }

    .scan-input {
        width: 80%;
        max-width: 400px;
        height: 60px;
        font-size: 22px;
        border-radius: 14px;
        border: none;
        padding: 10px;
        text-align: center;
        margin-bottom: 20px;
    }

    .btn-submit {
        background: #0d6b57;
        color: white;
        border: none;
        width: 80%;
        max-width: 400px;
        height: 80px;
        border-radius: 10px;
        font-size: 30px;
        font-weight: bold;
    }
</style>

<div class="container py-5">

    <img src="{{ asset('logo.png') }}" width="140">

    <form method="POST" action="{{ route('deal.scan.post') }}" id="deal-form">
        @csrf

        <input
            type="text"
            name="user_code"
            id="user_code"
            class="scan-input"
            placeholder="ENTER USER CODE.."
            autocomplete="off">

        <h2>Lukt scannen niet?<br>Voer de cijfercode in.</h2>

        <input
            type="text"
            name="deal_code"
            id="deal_code"
            class="scan-input"
            placeholder="ENTER DEALS CODE.."
            autocomplete="off">

        <br>

        <button type="submit" class="btn-submit">
            Volgende
        </button>

    </form>

</div>

<script>
    const userInput = document.getElementById('user_code');
    const dealInput = document.getElementById('deal_code');

    // Hidden scanner buffer
    let scanBuffer = '';

    // First focus
    userInput.focus();

    // Scanner input capture
    document.addEventListener('keydown', function(e) {

        // Ignore Shift/Ctrl etc
        if (e.key.length > 1 && e.key !== 'Enter') {
            return;
        }

        // QR Scanner completed
        if (e.key === 'Enter') {

            e.preventDefault();

            const scannedValue = scanBuffer.trim();

            scanBuffer = '';

            if (!scannedValue) {
                return;
            }

            // Split USERCODE|DEALCODE
            if (scannedValue.includes('|')) {

                const parts = scannedValue.split('|');

                if (parts.length >= 2) {

                    userInput.value = parts[0].trim();
                    dealInput.value = parts[1].trim();

                    // Optional success effect
                    userInput.style.border = '3px solid green';
                    dealInput.style.border = '3px solid green';
                }

            } else {

                // Manual fallback
                if (userInput.value === '') {

                    userInput.value = scannedValue;

                    dealInput.focus();

                } else {

                    dealInput.value = scannedValue;
                }
            }

            return;
        }

        // Build scanner string
        scanBuffer += e.key;

    });
</script>

@endsection