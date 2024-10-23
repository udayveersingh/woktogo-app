@extends('common.index')

@section('content')
<div class="flex flex-col items-center justify-center min-h-full bg-yellow-500 transition-all duration-300" id="overlay-container">
    <div class="text-center mb-4">
        <p class="text-lg md:text-xl">Welcome to the Scanner Page!</p>
        <p class="text-lg md:text-xl">Please enter your details below:</p>
    </div>
    <input type="text" placeholder="Enter your details"
        class="z-50 border border-gray-300 rounded-lg p-3 w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 max-w-md text-center focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent uppercase"
        onfocus="addOverlay()" onblur="removeOverlay()" />
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