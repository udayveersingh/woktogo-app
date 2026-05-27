@extends('common.index')
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

    .deal-scan-btn {
        width: 330px;
        height: 109px;
        padding: 38px;
    }
</style>

@section('content')
<div class="py-5 md:min-h-full bg-yellow-500 flex flex-col items-center justify-between">

    <form method="POST" action="{{ route('deal.scan.post') }}" id="deal-form">
        @csrf

        <input
            type="text"
            name="user_code"
            id="user_code"
            inputmode="none"
            class="scan-input z-50 border border-gray-300 rounded-xl p-3  max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red"
            placeholder="ENTER USER CODE.."
            autocomplete="off">

        <h2 class="text-2xl font-bold">Lukt scannen niet?<br>Voer de cijfercode in.</h2>

        <input
            type="text"
            name="deal_code"
            id="deal_code"
            inputmode="none"
            class="scan-input z-50 border border-gray-300 rounded-xl p-3 max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red"
            placeholder="ENTER DEALS CODE.."
            autocomplete="off">

        <br>

        <button type="submit" class="btn-submit deal-scan-btn bg-red rounded-md px-4 py-12 text-lg font-bold text-white max-w-sm text-center block mt-4 mx-auto">
            Volgende
        </button>

    </form>

</div>

<script>
    const userInput = document.getElementById('user_code');
    const dealInput = document.getElementById('deal_code');

    let scanBuffer = '';
    let scanTimeout;

    // First focus
    userInput.focus();

    document.addEventListener('keydown', function(e) {

        // Ignore control keys
        if (e.key.length > 1 && e.key !== 'Enter') {
            return;
        }

        // Reset timeout on every key
        clearTimeout(scanTimeout);

        scanTimeout = setTimeout(() => {
            scanBuffer = '';
        }, 200);

        // Scanner completed
        if (e.key === 'Enter') {

            e.preventDefault();

            const scannedValue = scanBuffer.trim();

            scanBuffer = '';

            if (!scannedValue) return;

            // QR format: USER|DEAL
            if (scannedValue.includes('|')) {

                const parts = scannedValue.split('|');

                if (parts.length >= 2) {

                    userInput.value = parts[0].trim();
                    dealInput.value = parts[1].trim();

                    // Success UI
                    userInput.style.border = '3px solid green';
                    dealInput.style.border = '3px solid green';
                }

            } else {

                // Manual fallback
                if (document.activeElement === userInput) {

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