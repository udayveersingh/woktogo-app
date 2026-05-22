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
<div class="max-w-[365px] mx-auto py-4 px-6">
    <div class="text-gray-800 bg-white text-lg py-12 px-7 rounded-xl mb-4">
        <input
            type="text"
            id="scanner-input"
            autofocus
            placeholder="Scan QR" class="z-50 border border-gray-300 rounded-xl w-3/4 max-w-sm text-center text-black bg-white p-2 focus:outline-none focus:border-blue-500 caret-red-500" />
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

           actions.innerHTML = `
            <button 
                onclick="awardPoints(${customer.id}, 10)"
                class="bg-[#ff0511] rounded-full px-4 py-3 text-lg md:text-xl font-bold w-full text-white transition"
            >
                Add 10 Points
            </button>
        `;

            safeFocus();

        } catch (error) {
            showError('Connection Error');
            safeFocus();
        }
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
                    New Balance: <strong>${data.new_balance}</strong>
                </div>
            `;

                actions.innerHTML = '';
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