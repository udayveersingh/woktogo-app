@extends('common.index')

@section('content')
<div class="container mx-auto px-4 py-8">
    @guest
    @if (Route::has('login'))
    <h3 class="text-center text-lg font-semibold text-gray-700">{{ __('You are not logged in Yet!') }}</h3>
    @endif
    @else
    <div class="flex justify-center">
        <div class="w-full max-w-sm">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-blue-500 text-white font-bold text-lg p-4 text-center">
                    {{ __('Dashboard') }}
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 text-center mb-2">
                        {{ __('You are logged in!') }}
                    </h3>
                    <h4 class="text-md text-gray-600 text-center mb-4">
                        {{ Auth::user()->name }}
                    </h4>
                    <div class="flex justify-center mb-3">
                        <!-- Display the QR Code and allow download -->
                        <a href="data:image/png;base64,{!! base64_encode($user_qr)!!}" download="{{ Auth::user()->name }}" class="block">
                            <img src="data:image/png;base64,{!! base64_encode($user_qr)!!}" alt="User QR Code" class="w-32 h-32 rounded-md shadow-lg transition-transform transform hover:scale-110"> <!-- Added hover effect -->
                        </a>
                    </div>
                    <p class="text-center text-gray-500 text-sm mt-8">
                        {{ __('Download your QR code by clicking on the image above.') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endguest
</div>
@endsection