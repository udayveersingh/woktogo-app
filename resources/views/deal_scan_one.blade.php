@extends('common.index')

@section('content')
<div id="reader" width="600px"></div>
@session('error')
<div class="bg-[#b91f25]/[0.5] rounded-xl border border-red p-1 text-white text-sm text-center my-1" role="alert">
    {{ $value }}
</div>
@endsession

@session('success')
<div class="bg-[#196450]/[0.5] rounded-xl border border-secondary p-1 text-white text-sm text-center my-1" role="alert">
    {{ $value }}
</div>
@endsession
<form action="{{route('owner_scan_deal')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="flex flex-col items-center pt-40 min-h-full bg-yellow-500 transition-all duration-300" id="overlay-container">
        <div class="text-left w-3/4 max-w-sm mb-4">
            <p class="text-lg font-semibold md:text-xl">Lukt scannen niet?478</p>
            <p class="text-lg font-semibold md:text-xl">Voer de cijfercode in.</p>
        </div>
        <input type="hidden" class="z-50 border border-gray-300 rounded-xl p-3 w-3/4 max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red" id="user-code" name="user_code" onfocus="addOverlay()" onblur="removeOverlay()" />
        <input type="text" class="z-50 border border-gray-300 rounded-xl p-3 w-3/4 max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red" id="deal-code" name="deal_code" />
        <button class="py-2 px-4 mt-4 text-lg text-white bg-secondary rounded-md">Next</button>
        <div class="flex flex-col space-y-2 px-4 my-4 text-center">
            <a href="{{route('owner_page')}}" class="deal-scan-btn bg-red rounded-xl px-5 py-5 text-xl font-bold text-white">Stop met scannen</a> <!-- Reduced from text-xl to text-lg -->
        </div>
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

                // Fetch request inside the callback to ensure decodedText is defined
                fetch('/deal-scan-qr', {
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
                        document.getElementById('user-code').value = data.data;
                        console.log(data);
                    })
                    .catch(error => console.error('Error:', error));
            },
            (errorMessage) => {
                console.error(`QR Code parse error: ${errorMessage}`);
            }
        ).catch(err => {
            console.error(`Unable to start scanning: ${err}`);
        });
    });
</script>