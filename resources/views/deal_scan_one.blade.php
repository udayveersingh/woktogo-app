@extends('common.index')

@section('content')
<style>
    #reader {
        width: 100%;
        height: auto;
        max-width: 500px;
        /* Or set your desired maximum width */
        margin: 0 auto;
    }
</style>
<div id="reader"></div>
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
    <div class="flex flex-col items-center mt-4 min-h-full bg-primary transition-all duration-300" id="overlay-container">
        <input type="text" class="z-50 border border-gray-300 rounded-xl p-3 w-3/4 max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red" id="user-code" placeholder="enter user code.." name="user_code" onfocus="addOverlay()" onblur="removeOverlay()" />
        <div class="text-center w-3/4 max-w-sm mb-4">
            <p class="text-lg font-semibold md:text-xl">Lukt scannen niet?</p>
            <p class="text-lg font-semibold md:text-xl">Voer de cijfercode in.</p>
        </div>
        <input type="text" class="z-50 border border-gray-300 rounded-xl p-3 w-3/4 max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red" placeholder="enter deals code.." id="deal-code" name="deal_code" />
        <button class="py-12 px-4 mt-4 text-lg text-white bg-secondary rounded-md w-3/4 max-w-sm font-bold" id="next-button"> Volgende</button>
        <hr class="custom-hr">
        <a href="{{route('owner_page')}}" class="deal-scan-btn bg-red rounded-md px-4 py-12 text-lg font-bold text-white w-3/4 max-w-sm text-center block mt-4 mx-auto">Stop met scannen</a> <!-- Reduced from text-xl to text-lg -->
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
                        // Show the user data in the user-code input field
                        document.getElementById('user-code').value = data.user;
                        document.getElementById('deal-code').value = data.deal;

                        // Scroll the page to the input field after QR code scanning
                        const inputField = document.getElementById('next-button');
                        inputField.scrollIntoView({
                            behavior: 'smooth', // Smooth scroll animation
                            block: 'start', // Align the input field at the center of the view
                        });

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