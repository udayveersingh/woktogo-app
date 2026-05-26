@extends('common.index')

<style>
    body {
        background: #111;
        color: white;
        font-family: Arial;
        text-align: center;
        padding-top: 50px;
    }

    input {

        width: 80%;
        height: 100px;
        font-size: 40px;
        text-align: center;
    }

    button {

        font-size: 30px;
        padding: 20px 40px;
        margin-top: 20px;
        cursor: pointer;
    }

    #result {

        margin-top: 40px;
        font-size: 35px;
    }

    .success {

        color: #ff0511;
        font-size: 24px;
        margin-bottom: 15px;
    }

    .error {

        color: red;
    }
</style>

@section('content')

<h1>QR Scanner</h1>
@if(session('message'))
<div class="bg-green-500 text-white px-4 py-3 rounded-xl mb-4 text-center font-bold">
    {{ session('message') }}
</div>
@endif
<div class="max-w-[365px] mx-auto py-4 px-6">
    <div id="scanner-section"
        class="text-gray-800 bg-white text-lg py-12 px-7 rounded-xl mb-4">

        <input
            type="text"
            id="scanner-input"
            autofocus
            placeholder="Scan QR"
            class="z-50 border border-gray-300 rounded-xl w-3/4 max-w-sm text-center text-black bg-white p-2 focus:outline-none focus:border-blue-500 caret-red-500" />

    </div>
    <div class="flex flex-col space-y-2 px-4 my-4 text-center">
        <a href="{{route('deal.scan.view') }}" class="deal-scan-btn bg-red rounded-xl px-5 text-xl font-bold text-white">Deal verzilveren</a>
    </div>
    <div id="result"></div>

    <div id="actions"></div>
</div>

<script>
    const input = document.getElementById('scanner-input');
    const result = document.getElementById('result');
    const actions = document.getElementById('actions');

    let lastCode = '';
    let lastTime = 0;

    // Safe focus function (IMPORTANT for iPad Safari)
    function safeFocus() {
        setTimeout(() => {
            input.focus();
        }, 200);
    }

    // Initial focus
    window.addEventListener('load', () => {
        safeFocus();
    });

    // Keep focus only when needed (NO INTERVAL - IMPORTANT FIX)
    document.addEventListener('click', () => {
        safeFocus();
    });

    // Scan handler
    input.addEventListener('keydown', function(e) {

        if (e.key === 'Enter') {

            e.preventDefault();

            const code = input.value.trim();

            if (!code) return;

            // Duplicate scan prevention (3 sec window)
            const now = Date.now();

            if (code === lastCode && now - lastTime < 3000) {
                showError('Duplicate Scan');
                input.value = '';
                safeFocus();
                return;
            }

            lastCode = code;
            lastTime = now;

            input.value = '';

            scanQr(code);
        }
    });

    // Scan API call
    async function scanQr(code) {

        result.innerHTML = '<div>Checking...</div>';
        actions.innerHTML = '';

        try {

            const response = await fetch('/scan-qr', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    code
                })
            });

            const data = await response.json();

            if (!data.success) {
                showError('Customer Not Found');
                safeFocus();
                return;
            }

            const customer = data.customer;

            result.innerHTML = `
            <div class="success">
                <strong class="text-white">${customer.name}</strong><br>
                Current Points: ${customer.points}
            </div>
        `;

            document.getElementById('scanner-section').style.display = 'none';

            actions.innerHTML = `
                        <div class="mt-4">

                            <input
                                type="number"
                                id="manual-points"
                                value="10"
                                min="1"
                                class="border border-gray-300 rounded-lg p-3 text-black text-center w-full mb-3"
                                oninput="updateButtonText()"
                            >

                            <button
                                id="add-points-btn"
                                onclick="awardManualPoints(${customer.id})"
                                class="bg-[#ff0511] rounded-full px-4 py-3 text-lg md:text-xl font-bold w-full text-white transition"
                            >
                                Add 10 Points
                            </button>

                        </div>
                    `;

            safeFocus();

        } catch (error) {
            showError('Connection Error');
            safeFocus();
        }
    }

    // Update button text dynamically
    function updateButtonText() {

        const pointsInput = document.getElementById('manual-points');

        const button = document.getElementById('add-points-btn');

        let points = parseInt(pointsInput.value);

        if (isNaN(points) || points < 1) {
            points = 1;
        }

        button.innerText = `Add ${points} Points`;
    }

    // Manual award function
    function awardManualPoints(userId) {

        const pointsInput = document.getElementById('manual-points');

        let points = parseInt(pointsInput.value);

        if (isNaN(points) || points < 1) {

            showError('Enter valid points');

            return;
        }

        awardPoints(userId, points);
    }

    // Award points
    async function awardPoints(userId, points) {

        try {

            const response = await fetch('/award-points', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    user_id: userId,
                    points: points
                })
            });

            const data = await response.json();

            if (data.success) {
                result.innerHTML = `
                <div class="success">
                    +${points} Points Added<br>
                    New Balance: <strong>${data.new_balance}</strong><br><br>
                    Ready For Next Scan
                </div>
            `;

                actions.innerHTML = '';

                setTimeout(() => {

                    // Reset UI
                    result.innerHTML = '';

                    document.getElementById('scanner-section').style.display = 'block';

                    input.value = '';

                    safeFocus();

                }, 10000);

            } else {

                showError('Failed To Add Points');
            }

            safeFocus();

        } catch (error) {
            showError('Server Error');
            safeFocus();
        }
    }

    // Error helper
    function showError(msg) {
        result.innerHTML = `
        <div class="error">
            ${msg}
        </div>`;
    }
</script>

@endsection