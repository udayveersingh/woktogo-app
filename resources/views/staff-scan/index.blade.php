@extends('common.index')

<style>
    .mode-btn {
        flex: 1;
        padding: 14px;
        border-radius: 1rem;
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

<div class="min-h-screen bg-[#0e0c0a] text-white flex flex-col items-center px-4 py-6">

    {{-- TOP TOGGLE --}}
    <div class="w-full max-w-md bg-[#171614] border border-[#262626] rounded-2xl p-1 flex mb-6">

        <button
            id="points-tab"
            class="mode-btn active-mode  flex items-center md:gap-2 justify-center text-center flex-col md:flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" ><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.2"></circle><path d="M12 7v10M9 9.5h4.5a1.5 1.5 0 010 3H9.5a1.5 1.5 0 000 3H14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" ></path></svg>
            Punten toevoegen

        </button>

        <button
            id="deals-tab"
            class="mode-btn flex items-center md:gap-2 justify-center text-center flex-col md:flex-row">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"><path d="M3 8a2 2 0 012-2h14a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a2 2 0 100-4V8z" stroke="currentColor" stroke-width="2"></path><path d="M14 7v10" stroke="currentColor" stroke-width="2" stroke-dasharray="2 2.5"></path></svg>
            Deal verzilveren

        </button>

    </div>

    {{-- MAIN CARD --}}
    <div class="w-full max-w-md bg-[#171614] border border-[#262626] rounded-3xl p-6">

        {{-- STATUS --}}
        <div class="flex justify-center mb-6" id="op-scan">

            <div class="bg-[#1e1e1e] px-4 py-2 rounded-full text-xs font-bold flex items-center gap-2">

                <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>

                WACHTEN OP SCAN

            </div>

        </div>

        {{-- HIDDEN SCANNER INPUT --}}
        <!-- <div class="opacity-0 absolute pointer-events-none"> -->
        <!-- <div class="hidden"> -->

        <input
            type="text"
            id="scanner-input"
            class="opacity-0 absolute"
            autofocus>
        <!-- </div> -->

        {{-- DYNAMIC CONTENT --}}
        <div id="dynamic-content">

            {{-- IDLE SCREEN --}}
            <div id="idle-screen" class="text-center">

                <div class="flex justify-center mb-6">

                    <div class="w-36 h-36 border border-dashed border-gray-600 rounded-2xl flex items-center justify-center">

                        <div class="grid grid-cols-2 gap-2">

                            <div class="w-6 h-6 border-2 border-gray-500 rounded"></div>
                            <div class="w-6 h-6 border-2 border-gray-500 rounded"></div>
                            <div class="w-6 h-6 border-2 border-gray-500 rounded"></div>

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

                <div class="flex bg-[#252422] p-4 rounded-2xl mt-2 gap-2">
                    <div class="flex items-center gap-2 text-sm flex-col md:flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"><rect x="7" y="2.5" width="10" height="19" rx="2.5" stroke="#E8B305" stroke-width="2"></rect><rect x="10.5" y="18" width="3" height="1.4" rx="0.7" fill="#E8B305"></rect></svg>
                        <span class="text-xs md:text-sm"> Klant toont QR</span>
                    </div>
                    <span>→</span>
                    <div class="flex items-center gap-2 text-sm flex-col md:flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"><rect x="3" y="6" width="9" height="8" rx="1.5" stroke="#E8B305" stroke-width="2"></rect><rect x="12" y="8" width="6" height="4" stroke="#E8B305" stroke-width="2"></rect><rect x="6" y="14" width="3" height="6" rx="1" stroke="#E8B305" stroke-width="2"></rect><path d="M19 7l3-1M19 10h3M19 13l3 1" stroke="#E8B305" stroke-width="2" stroke-linecap="round"></path></svg>
                        <span class="text-xs md:text-sm"> Handscanner</span>
                    </div>
                    <span>→</span>
                    <div class="flex items-center gap-2 text-sm flex-col md:flex-row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M5 12.5l5 5L20 7" stroke="#147A5F" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                        <span class="text-xs md:text-sm">Klaar</span>   
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- MANUAL ENTRY CARD --}}
    <div id="manual-entry-card" class="w-full max-w-md bg-[#171614] border border-[#262626] rounded-3xl p-5 mt-6 flex items-center justify-between">

        <div class="flex-auto">

            <h3 class="font-bold text-lg">
                Lukt scannen niet?
            </h3>

            <p class="text-gray-500 text-sm">
                Voer de cijfercode handmatig in
            </p>

        </div>

        <button id="manual-btn" onclick="showManualEntry()" class="bg-[#343331] transition px-4 py-4 rounded-xl text-white font-semibold leading-tight border border-[#4e4d4b]">

            Code invoeren

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
    let isManualMode = false;

    // =========================
    // AUTO FOCUS
    // =========================

    // only scan one time
    setInterval(() => {
        if (!isManualMode && document.activeElement !== input) {
            input.focus();
        }
    }, 500);

    // =========================
    // SCANNER
    // =========================

    // ✅ handle scan logic
    function handleScan(code) {

        const now = Date.now();

        if (code === lastCode && now - lastTime < 3000) {
            showError('Duplicate Scan');
            input.value = '';
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

    // ENTER based scan (primary)
    input.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            handleScan(input.value.trim());
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

        // document.getElementById('scanner-input').style.display = 'none';
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
        class="w-full bg-[#138a63] hover:bg-[#0f7554] py-4 rounded-2xl font-bold text-base md:text-xl">

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
         isManualMode = true; // STOP scanner focus

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
                class="w-full bg-[#1a1a1a] border border-[#333] rounded-2xl p-5 text-white text-center text-base md:text-xl mb-6 focus:outline-none placeholder:text-white">

            <button
                onclick="submitManualCustomerCode()"
                class="w-full bg-[#138a63] py-4 rounded-2xl font-bold text-base md:text-xl">

                Volgende

            </button>

        </div>
    `;
    }

    async function submitManualCustomerCode() {

        const code = document.getElementById('manual-customer-code').value.trim();

        if (!code) {
            showError('Voer klantcode in');
            return;
        }

        handleScan(code); // ✅ SAME FLOW as scanner
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
                class="w-full bg-[#1a1a1a] border border-[#333] rounded-2xl p-5 text-white text-center text-base md:text-xl mb-4 focus:outline-none placeholder:text-white">

            <input
                type="text"
                id="manual-deal-code"
                placeholder="Deal code"
                class="w-full bg-[#1a1a1a] border border-[#333] rounded-2xl p-5 text-white text-center text-base md:text-xl mb-6 focus:outline-none placeholder:text-white">

            <button
                onclick="submitManualDealCode()"
                class="w-full bg-[#138a63] py-4 rounded-2xl font-bold text-base md:text-xl">

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

        // scanDealQr(combinedCode);
        handleScan(combinedCode);
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

                <div class="text-red-500 text-2xl mb-6 flex justify-center">
                    <div class="w-[40px] md:w-[100px] h-[40px] md:h-[100px] bg-[#b72330] rounded-full flex justify-center items-center relative before:absolute before:w-[60px] before:md:w-[120px] before:h-[60px] before:md:h-[120px] before:bg-[#b72330]/50 before:rounded-full before:left-[-10px] before:top-[-10px] after:absolute after:w-[80px] after:md:w-[140px] after:h-[80px] after:md:h-[140px] after:bg-[#b72330]/20 after:rounded-full after:left-[-20px] after:top-[-20px] after:-z-20 before:-z-10 z-10">
                    <svg class="w-[32px] md:w-[68px]" xmlns="http://www.w3.org/2000/svg" width="68" height="68" viewBox="0 0 24 24" fill="none"><path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="3.5" stroke-linecap="round"></path></svg>
                    </div>
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

        isManualMode = false;
        document.getElementById('manual-entry-card').style.display = 'flex';

        dynamicContent.innerHTML = document.getElementById('idle-screen').outerHTML;
        document.getElementById('scanner-input').style.display = 'block';
        document.getElementById('op-scan').style.display = 'flex';

        enteredAmount = '';
        currentCustomer = null;

        input.value = '';
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