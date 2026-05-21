<!DOCTYPE html>
<html>

<head>

    <title>Scanner</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>

        body{
            background:#111;
            color:white;
            font-family:Arial;
            text-align:center;
            padding-top:50px;
        }

        input{

            width:80%;
            height:100px;
            font-size:40px;
            text-align:center;
        }

        button{

            font-size:30px;
            padding:20px 40px;
            margin-top:20px;
            cursor:pointer;
        }

        #result{

            margin-top:40px;
            font-size:35px;
        }

        .success{

            color:lightgreen;
        }

        .error{

            color:red;
        }

    </style>

</head>

<body>

<h1>QR Scanner</h1>

<input
    type="text"
    id="scanner-input"
    autofocus
    placeholder="Scan QR"
/>

<div id="result"></div>

<div id="actions"></div>

<script>

const input = document.getElementById('scanner-input');

const result = document.getElementById('result');

const actions = document.getElementById('actions');

let lastCode = '';

let lastTime = 0;

input.focus();

setInterval(() => {

    if(document.activeElement !== input){

        input.focus();
    }

},1000);

input.addEventListener('keydown', async function(e){

    if(e.key === 'Enter'){

        e.preventDefault();

        const code = input.value.trim();

        if(!code){
            return;
        }

        // Duplicate check
        const now = Date.now();

        if(code === lastCode && now - lastTime < 3000){

            alert('Duplicate Scan');

            input.value='';

            return;
        }

        lastCode = code;

        lastTime = now;

        scanQr(code);
    }
});

async function scanQr(code){

    result.innerHTML = 'Checking...';

    actions.innerHTML = '';

    try{

        const response = await fetch('/scan-qr',{

            method:'POST',

            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
            },

            body:JSON.stringify({
                code:code
            })
        });

        const data = await response.json();

        if(!data.success){

            result.innerHTML = `
                <div class="error">
                    Customer Not Found
                </div>
            `;

            input.value='';

            return;
        }

        const customer = data.customer;

        result.innerHTML = `
            <div class="success">
                ${customer.name}<br>
                Current Points: ${customer.points}
            </div>
        `;

        actions.innerHTML = `
            <button onclick="awardPoints(${customer.id},10)">
                +10 Points
            </button>
        `;

        input.value='';

    }catch(error){

        result.innerHTML = `
            <div class="error">
                Connection Error
            </div>
        `;
    }
}

async function awardPoints(userId, points){

    try{

        const response = await fetch('/award-points',{

            method:'POST',

            headers:{
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
            },

            body:JSON.stringify({
                user_id:userId,
                points:points
            })
        });

        const data = await response.json();

        if(data.success){

            result.innerHTML = `
                <div class="success">
                    +${points} Points Added<br>
                    New Balance: ${data.new_balance}
                </div>
            `;

            actions.innerHTML = '';
        }

    }catch(error){

        result.innerHTML = `
            <div class="error">
                Failed To Add Points
            </div>
        `;
    }

    input.focus();
}
</script>

</body>
</html>