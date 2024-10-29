@extends('common.index')

@section('content')
<div class="mx-auto px-4 py-8 max-w-sm mt-20">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-greenheader text-white font-bold text-xl p-4 text-center">
                    {{ __('Thank You!') }}
                </div>
                <div class="p-6 text-center">
                    <h3 class="text-lg font-semibold text-green-500 mb-2">
                        {{ __('Your order has been placed successfully!') }}
                    </h3>
                    <p class="text-lg text-center font-semibold text-gray-800 mt-4">
                        {{ __('Dine Together | Smile Together!') }}
                    </p>
                    <p class="text-xs text-gray-600 mb-3 mt-6">
                        {{ __('We appreciate your business and hope you enjoy your meal!') }}
                    </p>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
