@extends('common.index')

@section('content')
<style>
    
</style>
<!-- @session('success')
<div class="bg-[#196450]/[0.5] rounded-xl border border-secondary p-1 text-white text-sm text-center my-1" role="alert">
    {{ $value }}
</div>
@endsession -->
<div class="mx-auto px-4 py-8 max-w-sm mt-20">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <!-- <div class="bg-white shadow-lg rounded-lg overflow-hidden">
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

                    <button onclick="window.location=`{{ url('owner-page') }}`" class="w-full bg-secondary text-lg text-white rounded-xl mt-4">Back</button> 
                   
                    
                </div>
            </div> -->

            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="bg-greenheader text-white font-bold text-xl py-12 p-4 text-center">
                    {{ __('Scan succesvol!') }}
                </div>
                <div class="p-6 text-center py-12">

                    <p class="text-black font-semibold px-5 rounded-xl d-block">
                        {{ __('De klant heeft') }}
                    </p>
                    <p class="text-lg text-center font-semibold text-gray-800 mt-4">
                        {{ !empty($user_points->points) ? $user_points->points:0}} punten ontvangen
                    </p>
                </div>
            </div>
            <button onclick="window.location=`{{ url('owner-page') }}`" class="w-full bg-secondary text-lg text-white py-8 rounded-xl mt-4 font-bold" style="margin-top:65px;">Begin met scannen</button>
        </div>
    </div>
</div>
@endsection