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
<div class="bg-[#1e181c] text-white flex w-full items-center relative max-w-[370px] mx-auto my-5 px-5 ">
    <!-- <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" /> -->
    <h1 class="text-2xl md:text-3xl uppercase font-bold text-white mx-auto flex-auto text-center">Mijn deals</h1>
    <a href="{{route('deal-info')}}" class="z-10 flex-grow-0 bg-[#ef1e21] text-white rounded-full border border-white w-7 h-7 inline-flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14"/>
            </svg>
        </a>
</div>

<div class="px-2 py-6 max-w-[370px] mx-auto">
    <!-- @session('success')
    <div class="bg-[#196450]/[0.5] rounded-xl border border-secondary p-1 text-white text-sm text-center my-1" role="alert">
        {{ $value }}
    </div>
    @endsession -->

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
    <div class="grid grid-cols-3 rounded-xl overflow-hidden text-center relative bg-[#1e181c] mb-8 border border-white">
        

        <!-- <img src="{{ url('storage/app/private/qrcodes/'.$user->qr_code_path) }}" alt="deal" class="max-w-20 mx-auto" /> -->
        <!-- <div class="text-lg font-bold dark:text-white">
            @if(!empty($user_qr))
            <img src="data:image/png;base64,{!! base64_encode($user_qr)!!}" alt="deal" class="max-w-50 mx-auto dark:invert-[70%] my-3" />
            @endif
            {{$user->code_number}}
        </div> -->

        <div class="text-base dark:text-white col-span-2 flex flex-col justify-center">
            <div class="text-white text-xl font-semibold mb-3">WOK <span class="text-[#ff0511] italic">Points</span></div>
            <!-- <button class="bg-red dark:bg-white text-white dark:text-black text-lg font-bold p-2 w-full inline-block rounded-md mt-4 max-w-[200px]">Aantal punten: {{$userPoints}}</button> -->
            <button class="text-white text-base font-bold uppercase w-full inline-block">Aantal punten: {{!empty($user->total_points) ? $user->total_points:0 }}</button>
            <div class="text-sm mt-2">Scan om punten te sparen</div>
        </div>

        <div class=" bg-white">
            @if(!empty($user_qr))
            <div class="bg-white inline-block rounded-lg">
                <img src="data:image/png;base64,{!! base64_encode($user_qr) !!}"
                    alt="QR Code"
                    class="max-w-50 mx-auto" />
            </div>
            @endif
            <div class="text-base uppercase text-center font-bold -mt-2 pb-2">{{$user->code_number}}</div>
        </div>
        
        
    </div><!--/ Information Card -->

    <div class="text-white mb-3 font-bold text-base">Verzilver direct je punten:</div>
    @php
    $sortedDeals = $all_deals->sortByDesc(function ($deal) use ($user, $user_deals) {
    $userDeal = $user_deals->firstWhere('deal_id', $deal->id);
    return (int)($deal->points <= $user->total_points && empty($userDeal));
        });
        @endphp

        <div class="deal_list grid grid-cols-3 gap-2">
            @foreach ($sortedDeals as $index => $item)
            @if($item->deadline > $currentDate)
            <div class="flex flex-col bg-white rounded-xl text-center overflow-hidden group relative dealCardWrapper">
                @php
                $userDeal = $user_deals->firstWhere('deal_id', $item->id);
                @endphp
                @if(empty($userDeal) && (int)$item->points > $user->total_points)
                <div class="card-front bg-grey">
                    <div class="bg-[#ff0511] p-2 rounded-t-lg h-20 flex justify-center items-center">
                        <img src="{{ asset($item->image) }}" alt="deal" class="max-h-[90px] w-full mx-auto object-contain" />   
                    </div>
                    <div class="bg-white p-4">
                        <div class="bg-grey-500 claim-title">
                            <h2 class="font-bold text-base mb-1">{{ $item->title }}</h2>
                            
                            <button class="text-black text-sm font-bold w-full inline-block rounded-md mt-4 showDealScanner uppercase">nog te claimen</button>
                        </div>
                        <div class="bg-grey-overlay">
                        </div>
                    </div>
                </div>
                @elseif(!empty($userDeal) && $userDeal->deal_id == $item->id)
                <div class="card-front bg-grey">                    
                    <div class="bg-[#ff0511] p-2 rounded-t-lg h-20 flex justify-center items-center">
                        <img src="{{ asset($item->image) }}" alt="deal" class="max-h-[90px] w-full mx-auto object-contain" />   
                    </div>
                    <div class="bg-white p-2">
                        <div class="bg-grey-500 claim-title">
                            <h2 class="font-bold text-sm mb-1 leading-tight">{{ $item->title }}</h2>
                            @if(!empty($item->description))
                            <p class="text-xs custom-text">{{ $item->description }}</p>
                            @endif
                            <button class="text-black text-sm font-bold w-full inline-block rounded-md mt-4 showDealScanner uppercase">Geclaimd</button>
                        </div>
                        <div class="bg-grey-overlay">
                        </div>
                    </div>
                </div>

                @else
                <div class="card-front bg-white">                    
                    <div class="bg-[#ff0511] p-2 rounded-t-lg h-20 flex justify-center items-center">
                        <img src="{{ asset($item->image) }}" alt="deal" class="max-h-full w-full mx-auto object-contain" />   
                    </div>
                    <div class="bg-white p-2">
                        <h2 class="font-bold text-sm mb-1 leading-tight">{{ $item->title }}</h2>
                        @if(!empty($item->description))
                        <p class="text-xs custom-text ">{{ $item->description }}</p>
                        @endif
                        <button class=" text-black text-sm font-bold w-full inline-block rounded-md mt-4 showDealScanner uppercase">nog te claimen</button>
                    </div>
                </div>
                <div class="card-back hidden absolute top-0 left-0 right-0 bottom-0 bg-white items-center justify-center flex-col">
                    @if (!empty($item->qr_code))
                    <img src="data:image/png;base64,{{ base64_encode($item->qr_code) }}" alt="deal" class="max-w-40 mx-auto mt-2 w-full" />
                    @endif
                    <div class="text-sm font-semibold">{{!empty($item->code_number) ? $item->code_number:''}}</div>
                    <button class="text-black uppercase text-sm font-bold w-full inline-block rounded-md mt-4 hideDealScanner">Annuleer</button>
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