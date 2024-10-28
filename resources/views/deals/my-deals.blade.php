@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Mijn deals</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">
    @session('success')
    <div class="bg-[#196450]/[0.5] rounded-xl border border-secondary p-1 text-white text-sm text-center my-1" role="alert">
        {{ $value }}
    </div>
    @endsession

    <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-10">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>

    <div class="flex flex-col rounded-xl overflow-hidden text-center relative bg-white mb-8 py-8 px-3">
        <button class="absolute right-4 top-4">
            <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="2 2 20 20">
                <g id="Warning / Info">
                    <path id="Vector" d="M12 11V16M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21ZM12.0498 8V8.1L11.9502 8.1002V8H12.0498Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </button>

        <img src="{{ asset('images/barcode.png') }}" alt="deal" class="max-w-20 mx-auto" />
        <div class="text-lg font-bold mt-2">CF 045 699</div>
        <div class="text-base mb-12 mt-4">Scan om punten te sparen</div>
        <div class="text-base font-bold">Aantal punten tot een gratis maaltijd</div>
        <div class="bg-[#cecece] h-2 relative mt-2">
            <div class="absolute left-0 top-0 bottom-0 w-[60%] bg-secondary"></div>
        </div>
        <div class="text-sm">40 van de 200 punten</div>
    </div><!--/ Information Card -->

    <div class="deal_list flex flex-col gap-7">

        @foreach ($all_deals as $item)
            <div class="flex flex-col rounded-xl text-center overflow-hidden group relative dealCardWrapper">
                <div class="card-front bg-secondary">
                    <div class="p-4">
                        <img src="{{ asset($item->image) }}" alt="deal" class="max-w-20 mx-auto" />
                    </div>
                    <div class="bg-white p-4">
                        <h2 class="font-bold text-2xl mb-1">{{ $item->title }}</h2>
                        <p class="text-sm">{{ $item->description }}</p>
                        <button class="bg-secondary text-white text-xl font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px] showDealScanner">Claim deal</button>
                    </div>
                </div>
                <div class="card-back hidden absolute top-0 left-0 right-0 bottom-0 bg-white items-center justify-center gap-2 flex-col">
                    <img src="{{ asset('images/barcode.png') }}" alt="deal" class="max-w-40 mx-auto mt-2" />
                    <button class="bg-secondary text-white text-xl font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px] hideDealScanner">Annuleer</button>
                </div>

            </div><!--/Deal card -->
        @endforeach

    </div>

</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dealCards = document.querySelectorAll('.dealCardWrapper');

        dealCards.forEach(function(card) {
            const showScannerButton = card.querySelector('.showDealScanner');
            const hideScannerButton = card.querySelector('.hideDealScanner');
            const cardBack = card.querySelector('.card-back');
            const cardFront = card.querySelector('.card-front');

            if (showScannerButton && cardBack) {
                showScannerButton.addEventListener('click', function() {
                    cardBack.classList.remove('hidden');
                    cardBack.classList.add('flex');
                });
            }

            if (hideScannerButton && cardBack) {
                hideScannerButton.addEventListener('click', function() {
                    cardBack.classList.add('hidden');
                    cardBack.classList.remove('flex');
                });
            }
        });
    });
</script>