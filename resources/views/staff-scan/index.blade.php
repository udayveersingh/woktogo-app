@extends('common.index')

<style>
    .mode-btn {
        flex: 1;
        padding: 14px;
        border-radius: 999px;
        color: #aaa;
        font-weight: 700;
        transition: .2s;
        text-align: center;
    }

    .active-mode {
        background: #f3c623;
        color: black;
    }

    .keypad-btn {
        background: #e5e5e5;
        color: black;
        padding: 18px;
        border-radius: 14px;
        font-size: 24px;
        font-weight: bold;
        transition: .2s;
    }

    .keypad-btn:hover {
        background: white;
    }
</style>

@section('content')

<div class="min-h-screen bg-black text-white flex flex-col items-center px-4 py-6">

    {{-- TOP TOGGLE --}}
    <div class="w-full max-w-md bg-[#151515] border border-[#2a2a2a] rounded-full p-1 flex mb-6">

        <button
            id="points-tab"
            class="mode-btn active-mode">

            Punten toevoegen

        </button>

        <button
            id="deals-tab"
            class="mode-btn">

            Deal verzilveren

        </button>

    </div>

    {{-- MAIN CARD --}}
    <div class="w-full max-w-md bg-[#111111] border border-[#262626] rounded-3xl p-6">

        {{-- STATUS --}}
        <div class="flex justify-center mb-6" id="op-scan">

            <div class="bg-[#1e1e1e] px-4 py-2 rounded-full text-xs font-bold flex items-center gap-2">

                <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>

                WACHTEN OP SCAN

            </div>

        </div>

        {{-- HIDDEN SCANNER INPUT --}}
        <!-- <div class="opacity-0 absolute pointer-events-none"> -->
        <div class="hidden">

            <input
                type="text"
                id="scanner-input"
                class="hidden"
                autofocus>
        </div>

        {{-- DYNAMIC CONTENT --}}
        <div id="dynamic-content">

            {{-- IDLE SCREEN --}}
            <div id="idle-screen" class="text-center">

                <div class="flex justify-center mb-6">

                    <div class="w-36 h-36 border border-dashed border-gray-600 rounded-2xl flex items-center justify-center">

                        <div class="grid grid-cols-2 gap-2">

                            <div class="w-6 h-6 border border-gray-500 rounded"></div>
                            <div class="w-6 h-6 border border-gray-500 rounded"></div>
                            <div class="w-6 h-6 border border-gray-500 rounded"></div>

                            <div class="grid grid-cols-2 gap-1">

                                <div class="w-2 h-2 bg-gray-500"></div>
                                <div class="w-2 h-2 bg-gray-500"></div>
                                <div class="w-2 h-2 bg-gray-500"></div>
                                <div class="w-2 h-2 bg-gray-500"></div>

                            </div>

                        </div>

                    </div>

                </div>

                <h2 class="text-2xl font-bold mb-2">

                    Klaar om te scannen

                </h2>

                <p class="text-gray-400 text-sm">

                    Richt de scanner op de QR-code van de klant

                </p>

            </div>

        </div>

    </div>

    {{-- MANUAL ENTRY CARD --}}
    <div id="manual-entry-card" class="w-full max-w-md bg-[#111111] border border-[#262626] rounded-3xl p-5 mt-6 flex items-center justify-between">

        <div>

            <h3 class="font-bold text-lg">
                Lukt scannen niet?
            </h3>

            <p class="text-gray-500 text-sm">
                Voer de cijfercode handmatig in
            </p>

        </div>

        <button id="manual-btn" onclick="showManualEntry()" class="hover:bg-[#3a3a3a] transition px-6 py-4 rounded-xl text-white font-bold leading-tight">

            Code<br>
            invoeren

        </button>

    </div>

</div>

<script>
    const input = document.getElementById('scanner-input');
    const dynamicContent = document.getElementById('dynamic-content');

    let currentMode = 'points';
    let currentCustomer = null;
    let enteredAmount = '';
    let currentDeal = null;

    let lastCode = '';
    let lastTime = 0;

    // =========================
    // AUTO FOCUS
    // =========================

    function safeFocus() {

        setTimeout(() => {

            input.focus();

        }, 150);
    }

    window.addEventListener('load', safeFocus);
    document.addEventListener('click', safeFocus);

    // =========================
    // SCANNER
    // =========================

    input.addEventListener('keydown', function(e) {

        if (e.key === 'Enter') {

            e.preventDefault();

            const code = input.value.trim();

            if (!code) return;

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

            if (currentMode === 'points') {

                scanQr(code);

            } else {

                scanDealQr(code);
            }
        }
    });

    // =========================
    // SCAN QR
    // =========================

    async function scanQr(code) {

        dynamicContent.innerHTML = `
            <div class="text-center py-10">
                Checking...
            </div>
        `;

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

                return;
            }

            currentCustomer = data.customer;

            showAmountScreen(currentCustomer);

        } catch (err) {

            showError('Connection Error');

        }
    }

    // =========================
    // AMOUNT SCREEN
    // =========================

    function showAmountScreen(customer) {
        document.getElementById('manual-entry-card').style.display = 'none';

        document.getElementById('scanner-input').style.display = 'none';
        document.getElementById('op-scan').style.display = 'none';
        enteredAmount = '';

        dynamicContent.innerHTML = `<div>
    {{-- CUSTOMER CARD --}}
    <div class="bg-[#171717] border border-[#2d2d2d] rounded-2xl p-4 flex items-center justify-between mb-5">

        <div class="flex items-center gap-3">

            <div class="w-12 h-12 rounded-full bg-yellow-400 text-black font-bold flex items-center justify-center">

                ${customer.name.charAt(0)}

            </div>

            <div>

                <div class="font-bold text-lg">

                    ${customer.name}

                </div>

                <div class="text-xs text-gray-400">

                    Current balance

                </div>

            </div>

        </div>

        <div class="text-yellow-400 font-bold">

            ${customer.points} pt

        </div>

    </div>

    {{-- AMOUNT BOX --}}
    <div class="border border-yellow-500 rounded-2xl p-6 mb-6 text-center">

        <div class="text-xs text-gray-400 uppercase mb-2">
            BESTEED BEDRAG

        </div>
        <input type="text" id="manual-points" value="0,00" inputmode="decimal" placeholder="0,00"
        class="bg-transparent text-center text-white text-6xl font-bold w-full focus:outline-none"
        oninput="updateButtonText()"/>

        <div class="text-xs text-gray-500 mt-3">

            = <span id="points-preview"></span> punten toevoegen

        </div>

    </div>

    {{-- BUTTON --}}
    <button
        id="submit-btn"
        onclick="submitPoints()"
        class="w-full bg-[#138a63] hover:bg-[#0f7554] py-4 rounded-2xl font-bold text-xl">

        Punten toevoegen

    </button>

   </div> `;
    }

    // =========================
    // UPDATE DISPLAY
    // =========================

    function updateButtonText() {

        const input = document.getElementById('manual-points');

        let value = input.value;

        // replace comma with dot
        value = value.replace(',', '.');

        let amount = parseFloat(value);

        if (isNaN(amount) || amount <= 0) {
            amount = 0;
        }

        // Example:
        // €17.50 => 17 points
        const points = Math.floor(amount);

        document.getElementById('points-preview').innerText = points;

        document.getElementById('submit-btn').innerText =
            ` Punten toevoegen`;
    }

    // =========================
    // SUBMIT POINTS
    // =========================

    async function submitPoints() {

        let amount = document.getElementById('manual-points').value;

        // convert comma to dot
        amount = amount.replace(',', '.');

        // convert to float
        amount = parseFloat(amount);

        if (isNaN(amount) || amount <= 0) {

            showError('Invalid amount');

            return;
        }

        // Example:
        // 80.50 => 80 points
        const points = Math.floor(amount);

        dynamicContent.innerHTML = `
        <div class="text-center py-10">
            Adding points...
        </div>
    `;

        try {

            const response = await fetch('/award-points', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },

                body: JSON.stringify({

                    user_id: currentCustomer.id,

                    points: points,

                    amount: amount

                })

            });

            const data = await response.json();

            if (data.success) {

                showSuccess(points, amount, data.new_balance);

            } else {

                showError('Failed');

            }

        } catch (e) {

            showError('Server Error');

        }
    }

    // =========================
    // SUCCESS SCREEN
    // =========================

    function showSuccess(points, amount, balance) {

        dynamicContent.innerHTML = `

            <div class="bg-[#1a1a1a] rounded-2xl p-5 text-left mb-6">

    <div class="flex justify-between mb-2">

        <span class="text-gray-400">

            Besteed bedrag

        </span>

        <span>

            €${amount.toFixed(2)}

        </span>

    </div>

    <div class="flex justify-between mb-2">

        <span class="text-gray-400">

            Vorige saldo

        </span>

        <span>

            ${currentCustomer.points} pt

        </span>

    </div>

    <div class="flex justify-between">

        <span class="text-gray-400">

            Nieuw saldo

        </span>

        <span class="text-green-400 font-bold">

            ${balance} pt

        </span>

    </div>

</div>`;
    }

    async function scanDealQr(code) {

        dynamicContent.innerHTML = `
        <div class="text-center py-10">
            Deal controleren...
        </div>`;

        try {

            const response = await fetch('/scan-deal-qr', {

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

                showError(data.message || 'Deal not found');

                return;
            }

            currentCustomer = data.customer;
            currentDeal = data.deal;

            showDealScreen();

        } catch (e) {

            showError('Connection Error');
        }
    }



    function showDealScreen() {

        document.getElementById('manual-entry-card').style.display = 'none';

        dynamicContent.innerHTML = `

    <div class="bg-[#171717] border border-[#2d2d2d] rounded-2xl p-4 flex items-center gap-3 mb-5">

        <div class="w-12 h-12 rounded-full bg-yellow-400 text-black font-bold flex items-center justify-center">

            ${currentCustomer.name.charAt(0)}

        </div>

        <div>

            <div class="font-bold text-lg">
                ${currentCustomer.name}
            </div>

            <div class="text-xs text-gray-400">
                Klant-ID
            </div>

        </div>

    </div>

    <div class="bg-[#161616] rounded-3xl overflow-hidden border border-[#2d2d2d]">

        <div class="bg-red-700 p-5">

            <div class="text-xs uppercase font-bold mb-1">
                Deal
            </div>

            <div class="text-3xl font-bold">
                ${currentDeal.title}
            </div>

        </div>

        <div class="p-5 space-y-4">

            <div class="flex justify-between">
                <span class="text-gray-400">Code</span>
                <span>${currentDeal.code}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-400">Geldig t/m</span>
               <span>${formatDutchDate(currentDeal.valid_until)}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-400">Voorwaarde</span>
                <span>${currentDeal.title} </span>
            </div>

        </div>

    </div>

    <div class="grid grid-cols-2 gap-4 mt-6">

        <button
            onclick="resetScanner()"
            class="border border-gray-700 py-4 rounded-2xl font-bold">

            Annuleren

        </button>

        <button
            onclick="redeemDeal()"
            class="bg-[#138a63] py-4 rounded-2xl font-bold">

            Verzilveren

        </button>

    </div>
    `;
    }

    function showManualEntry() {

        if (currentMode === 'points') {

            showManualPointsEntry();

        } else {

            showManualDealEntry();
        }
    }

    function showManualPointsEntry() {

        dynamicContent.innerHTML = `<div>

            <h2 class="text-2xl font-bold mb-6 text-center">
                Klantcode invoeren
            </h2>

            <input
                type="text"
                id="manual-customer-code"
                placeholder="Klantcode"
                class="w-full bg-[#1a1a1a] border border-[#333] rounded-2xl p-5 text-black text-center text-xl mb-6 focus:outline-none">

            <button
                onclick="submitManualCustomerCode()"
                class="w-full bg-[#138a63] py-4 rounded-2xl font-bold text-xl">

                Volgende

            </button>

        </div>
    `;
    }

    async function submitManualCustomerCode() {

        const code = document.getElementById('manual-customer-code').value;

        if (!code) {

            showError('Voer klantcode in');

            return;
        }

        scanQr(code);
    }


    function showManualDealEntry() {

        dynamicContent.innerHTML = `

        <div>

            <h2 class="text-2xl font-bold mb-6 text-center">
                Deal handmatig invoeren
            </h2>

            <input
                type="text"
                id="manual-user-code"
                placeholder="User code"
                class="w-full bg-[#1a1a1a] border border-[#333] rounded-2xl p-5 text-black text-center text-xl mb-4 focus:outline-none">

            <input
                type="text"
                id="manual-deal-code"
                placeholder="Deal code"
                class="w-full bg-[#1a1a1a] border border-[#333] rounded-2xl p-5 text-black text-center text-xl mb-6 focus:outline-none">

            <button
                onclick="submitManualDealCode()"
                class="w-full bg-[#138a63] py-4 rounded-2xl font-bold text-xl">

                Deal controleren

            </button>

        </div>
    `;
    }

    async function submitManualDealCode() {

        const userCode = document.getElementById('manual-user-code').value;
        const dealCode = document.getElementById('manual-deal-code').value;

        if (!userCode || !dealCode) {

            showError('Vul beide velden in');

            return;
        }

        // SAME QR FORMAT
        const combinedCode = `${userCode}|${dealCode}`;

        scanDealQr(combinedCode);
    }




    async function redeemDeal() {

        dynamicContent.innerHTML = `
        <div class="text-center py-10">
            Deal verzilveren...
        </div>
    `;

        try {

            const response = await fetch('/redeem-deal', {

                method: 'POST',

                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },

                body: JSON.stringify({

                    user_id: currentCustomer.id,
                    deal_id: currentDeal.id

                })

            });

            const data = await response.json();

            if (!data.success) {

                showError(data.message || 'Failed');

                return;
            }

            dynamicContent.innerHTML = `

            <div class="text-center py-10">

                <div class="text-green-500 text-5xl mb-4">
                    ✓
                </div>

                <div class="text-2xl font-bold mb-2">
                    Deal succesvol verzilverd
                </div>

                <div class="text-gray-400">
                    Nieuw saldo: ${data.balance} punten
                </div>

            </div>
        `;

            setTimeout(() => {

                resetScanner();

            }, 3000);

        } catch (e) {

            showError('Server Error');
        }
    }

    function formatDutchDate(dateString) {

        const date = new Date(dateString);

        const months = [
            'jan.',
            'feb.',
            'mrt.',
            'apr.',
            'mei',
            'jun.',
            'jul.',
            'aug.',
            'sep.',
            'okt.',
            'nov.',
            'dec.'
        ];

        const day = date.getDate();

        const month = months[date.getMonth()];

        const year = date.getFullYear();

        return `${day} ${month} ${year}`;
    }

    // =========================
    // ERROR
    // =========================

    function showError(msg) {

        dynamicContent.innerHTML = `

            <div class="text-center py-10">

                <div class="text-red-500 text-2xl mb-3">

                    ✕

                </div>

                <div class="text-red-500 font-bold text-lg">

                    ${msg}

                </div>

            </div>

        `;

        setTimeout(() => {

            resetScanner();

        }, 3000);
    }

    // =========================
    // RESET
    // =========================

    function resetScanner() {

        document.getElementById('manual-entry-card').style.display = 'flex';

        dynamicContent.innerHTML = document.getElementById('idle-screen').outerHTML;
        document.getElementById('scanner-input').style.display = 'block';
        document.getElementById('op-scan').style.display = 'flex';

        enteredAmount = '';
        currentCustomer = null;

        input.value = '';

        safeFocus();
    }

    // =========================
    // TOGGLE
    // =========================

    document.getElementById('points-tab').onclick = () => {

        currentMode = 'points';

        setActiveTab();

        resetScanner();
    };

    document.getElementById('deals-tab').onclick = () => {

        currentMode = 'deals';

        setActiveTab();

        resetScanner();
    };

    function setActiveTab() {

        document.getElementById('points-tab').classList.remove('active-mode');
        document.getElementById('deals-tab').classList.remove('active-mode');

        if (currentMode === 'points') {

            document.getElementById('points-tab').classList.add('active-mode');

        } else {

            document.getElementById('deals-tab').classList.add('active-mode');

        }
    }
</script>

@endsection