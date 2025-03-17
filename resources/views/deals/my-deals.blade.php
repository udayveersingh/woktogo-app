@extends('common.index')

@section('content')
<style>
    .bg-grey {
        --tw-bg-opacity: 1;
        background-color: rgb(128 128 128 / var(--tw-bg-opacity));
        /* Standard grey */
    }

    .deal-image {
        position: relative;
        /* z-index: 1; */
        width: 160px;
        height: 160px;
        /* object-fit: cover; */
        /* Ensure the image scales correctly */
    }

    .claim-title {
        position: relative;
    }

    .bg-grey-overlay {
        position: absolute;
        background: #000;
        width: 100%;
        height: 100%;
        top: 0px;
        /* position: relative; */
        left: 0px;
        background-color: rgba(255, 255, 255, 0.8);

    }

    .max-width {
        max-width: 8rem;
    }
</style>
<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Mijn deals</h1>
</div>

<div class="px-5 py-6 max-w-[370px] mx-auto">
    @session('success')
    <div class="bg-[#196450]/[0.5] rounded-xl border border-secondary p-1 text-white text-sm text-center my-1" role="alert">
        {{ $value }}
    </div>
    @endsession

    <!-- <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-10">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a> -->

    @php
    if($user_points > $user_deals_points){
    $userPoints = !empty($user_points) ? $user_points - $user_deals_points:0;
    }else{
    $userPoints = !empty($user_points) ? $user_points:0;
    }
    @endphp
    <div class="flex flex-col rounded-xl overflow-hidden text-center relative bg-white dark:bg-black mb-8 px-3">
        <a href="{{route('deal-info')}}" class="absolute right-4 top-4 z-10">
            <svg width="24" height="24" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="2 2 20 20">
                <g id="Warning / Info">
                    <path id="Vector" d="M12 11V16M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21ZM12.0498 8V8.1L11.9502 8.1002V8H12.0498Z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="stroke-black dark:stroke-[#666]"></path>
                </g>
            </svg>
        </a>

        <!-- <img src="{{ url('storage/app/private/qrcodes/'.$user->qr_code_path) }}" alt="deal" class="max-w-20 mx-auto" /> -->
        <div class="text-lg font-bold dark:text-white">
            @if(!empty($user_qr))
            <img src="data:image/png;base64,{!! base64_encode($user_qr)!!}" alt="deal" class="max-w-50 mx-auto dark:invert-[70%] my-3" />
            @endif
            {{$user->code_number}}
        </div>
        <div class="text-base mb-12 dark:text-white">Scan om punten te sparen
            <button class="bg-red dark:bg-white text-white dark:text-black text-lg font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px]">Aantal punten: {{$userPoints}}</button>
        </div>
        <div class="text-sm pb-4">
        </div>
    </div><!--/ Information Card -->

    <div class="deal_list flex flex-col gap-7">
        @foreach ($all_deals as $index => $item)
        @if($item->deadline > $currentDate)
        <div class="flex flex-col rounded-xl text-center overflow-hidden group relative dealCardWrapper">
            @php
            $userDeal = $user_deals->firstWhere('deal_id', $item->id);
            @endphp
            @if(empty($userDeal) && (int)$item->points > $userPoints)
            <div class="card-front bg-grey">
                <div class="p-4">
                    <img src="{{ asset($item->image) }}" alt="deal" class="max-w-[100%] h-[180px] object-contain mx-auto deal-image" />
                </div>
                <div class="bg-white p-4">
                    <div class="bg-grey-500 claim-title">
                        <h2 class="font-bold text-2xl mb-1">{{ $item->title }}</h2>
                        <!-- @if(!empty($item->description))
                        <p class="text-sm custom-text max-w-[200px] mx-auto px-3">{{ $item->description }}</p>
                        @endif -->
                        <button class="bg-grey text-white text-lg font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px]">nog te claimen</button>
                    </div>
                    <div class="bg-grey-overlay">
                    </div>
                </div>
            </div>
            @elseif((int)$item->points == 100 && (int)$userPoints > 100)
            <div class="card-front bg-secondary">
                <div class="p-4">
                    <img src="{{ asset($item->image) }}" alt="deal" class="max-w-[100%] h-[180px] object-contain mx-auto" />
                </div>
                <div class="bg-white p-4">
                    <h2 class="font-bold text-2xl mb-1" style="color:red">{{ $item->title }}</h2>
                    <!-- @if(!empty($item->description))
                <p class="text-sm custom-text max-w-[200px] mx-auto px-3">{{ $item->description }}</p>
                @endif -->
                    <button class="bg-secondary text-white text-lg font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px] showDealScanner">Claim deal</button>
                </div>
            </div>

            <div class="card-back hidden absolute top-0 left-0 right-0 bottom-0 bg-white items-center justify-center flex-col">
                @if (!empty($item->qr_code))
                <img src="data:image/png;base64,{{ base64_encode($item->qr_code) }}" alt="deal" class="max-w-40 max-width-100 mx-auto mt-2 max-width" />
                @endif
                {{!empty($item->code_number) ? $item->code_number:''}}
                <button class="bg-secondary text-white text-xl font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px] hideDealScanner">Annuleer</button>
            </div>

            @elseif(!empty($userDeal) && $userDeal->deal_id == $item->id)
            <div class="card-front bg-grey">
                <div class="p-4">
                    <img src="{{ asset($item->image) }}" alt="deal" class="max-w-[100%] h-[180px] object-contain mx-auto deal-image" />
                </div>
                <div class="bg-white p-4">
                    <div class="bg-grey-500 claim-title">
                        <h2 class="font-bold text-2xl mb-1">{{ $item->title }}</h2>
                        @if(!empty($item->description))
                        <p class="text-sm custom-text max-w-[200px] mx-auto px-3">{{ $item->description }}</p>
                        @endif
                        <button class="bg-grey text-white text-lg font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px]">Geclaimd</button>
                    </div>
                    <div class="bg-grey-overlay">
                    </div>
                </div>
            </div>

            @else
            <div class="card-front bg-secondary">
                <div class="p-4">
                    <img src="{{ asset($item->image) }}" alt="deal" class="max-w-[100%] h-[180px] object-contain mx-auto" />
                </div>
                <div class="bg-white p-4 dark:bg-black dark:text-white">
                    <h2 class="font-bold text-2xl mb-1">{{ $item->title }}</h2>
                    @if(!empty($item->description))
                    <p class="text-sm custom-text max-w-[200px] mx-auto px-3">{{ $item->description }}</p>
                    @endif
                    <button class="bg-secondary text-white text-lg font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px] showDealScanner">nog te claimen</button>
                </div>
            </div>
            <div class="card-back hidden absolute top-0 left-0 right-0 bottom-0 bg-white items-center justify-center flex-col">
                @if (!empty($item->qr_code))
                <img src="data:image/png;base64,{{ base64_encode($item->qr_code) }}" alt="deal" class="max-w-40 mx-auto mt-2 deal-image" />
                @endif
                {{!empty($item->code_number) ? $item->code_number:''}}
                <button class="bg-secondary text-white text-xl font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px] hideDealScanner">Annuleer</button>
            </div>


            @endif

            
        </div><!--/Deal card -->
        @endif
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