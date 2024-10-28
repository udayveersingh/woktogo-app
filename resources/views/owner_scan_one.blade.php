@extends('common.index')

@section('content')
<div class="flex flex-col items-center pt-40 min-h-full bg-yellow-500 transition-all duration-300" id="overlay-container">
    <div class="text-left w-3/4 max-w-sm mb-4">
        <p class="text-lg font-semibold md:text-xl">Lukt scannen niet?</p>
        <p class="text-lg font-semibold md:text-xl">Voer de cijfercode in.</p>
    </div>
    <input type="text" class="z-50 border border-gray-300 rounded-xl p-3 w-3/4 max-w-sm text-center focus:outline-none focus:border-transparent uppercase caret-red" onfocus="addOverlay()" onblur="removeOverlay()" />
    <button onclick="window.location=`{{url('owner-scan-two')}}`" class="py-2 px-4 mt-4 text-lg text-white bg-secondary rounded-md">Next</button>
</div>

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