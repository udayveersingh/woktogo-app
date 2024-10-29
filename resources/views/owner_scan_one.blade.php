@extends('common.index')

@section('content')
<div id="reader" width="600px"></div>
<form action="{{route('owner_scan_two')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col items-center pt-40 min-h-full bg-yellow-500 transition-all duration-300" id="overlay-container">
        <div class="text-left w-3/4 max-w-sm mb-4">
            <p class="text-lg font-semibold md:text-xl">Lukt scannen niet?478</p>
            <p class="text-lg font-semibold md:text-xl">Voer de cijfercode in.</p>
        </div>
        <input type="text" class="z-50 border border-gray-300 rounded-xl p-3 w-3/4 max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red" name="user_code" onfocus="addOverlay()" onblur="removeOverlay()" />
        <button class="py-2 px-4 mt-4 text-lg text-white bg-secondary rounded-md">Next</button>
    </div>
</form>

<style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(128, 128, 128, 0.6);
        /* Dark overlay without blur */
        z-index: 10;
        /* Ensure overlay is above other content */
    }
</style>
@endsection

<script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const html5QrcodeScanner = new Html5Qrcode("reader");
        html5QrcodeScanner.start({
                facingMode: "environment"
            }, // Use the back camera
            {
                fps: 10,
                qrbox: 250
            },
            (decodedText, decodedResult) => {
                console.log(`Code matched = ${decodedText}`, decodedResult);
            },
            (errorMessage) => {
                console.error(errorMessage); // Log any scanning errors
            }
        ).catch(err => {
            console.error(`Unable to start scanning: ${err}`);
        });

    });


    fetch('/scan-qr', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                data: decodedText
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
        .catch(error => console.error('Error:', error));
</script>