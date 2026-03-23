@extends('common.index')

@section('content')

<!-- <div class="bg-[#1e181c] text-white h-[135px] flex flex-col justify-center items-center relative">
 
    <h1 class="text-2xl relative">Mijn deals</h1>
</div> -->

<div class="px-5 py-4 max-w-[370px] mx-auto">

    <!-- <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-4">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a> -->



    <div class="flex flex-col gap-7">
        <div class="flex flex-col rounded-lg text-center overflow-hidden group relative dealCardWrapper">
            <div class="card-front ">
                <div class="text-2xl md:text-3xl mb-8 uppercase font-bold text-white">Problemen met scannen?</div>

                <div class="grid grid-cols-2 gap-2">
                    <div class="text-white text-left">
                        <div class="text-white text-xl font-semibold mb-3">WOK <span class="text-[#ff0511] italic">Points</span></div>
                        <h2 class="font-bold text-base mb-1 uppercase">Als scannen niet werkt</h2>
                        <p class="text-[12px] text-white mb-4">Als het scannen niet werkt, geef dan de cijfercode mondelings door aan de medewerker.</p>
                        <div class="text-sm">cijfercode CF 045 699</div>
                    </div>

                    <div class="p-2 bg-white text-center mb-auto">
                        <img src="{{ asset('images/barcode.png') }}" alt="deal" class="max-w-24 w-full mx-auto mb-3" />                    
                        
                        <div class="text-lg font-bold tracking-wider">CF 045 699</div>
                    </div>
                </div>

                <div class="text-white text-left mt-7">
                    <h2 class="font-bold text-base mb-1 uppercase">Hoe en waar te scannen</h2>
                    <p class="text-[12px] mb-2 text-white">Houd jouw telefoon op 7-10 cm afstand van de scanner. Wanneer de code is gescand, hoor je een piep en verschijnt een bevestigingsbericht.</p>
                </div>
                
                
            </div>
        </div><!--/Deal card -->

        <div class="flex flex-col text-center group relative">
            <div class="grid grid-cols-2 gap-4">
                <div class="text-left">
                    <div class="rounded-lg bg-white">
                        <div class="bg-[#ff0511] p-2 rounded-t-lg h-20 flex justify-center items-center">
                            <img src="{{ asset('images/wok-food.png') }}" alt="food" class="max-h-[90px] w-full mx-auto object-contain" />   
                        </div>
                        <div class="p-3 text-center text-[12px]">
                            <div class="mb-3">Gratis mini rolls bij aankoop wokkie</div>
                            <a href="#" class="underline uppercase">NU CLAIMEN</a>
                        </div>
                    </div>
                </div>
                <div class=" text-white text-left">
                    <div class="font-bold text-base uppercase mb-2">Punten sparen</div>
                    <p class="text-[12px] ">Hé daar! 😊</p>
                        <p class="text-[12px] ">
                        Jij verdient punten voor elke euro die je uitgeeft.  <br />
                        Spaar ze voor toffe deals! Of geniet van een aanbieding, zonder punten in te leveren. <br />
                         <br />
                         Veel plezier! 🎉</p>
                </div>
                
            </div>

        </div><!--/Deal card -->


    </div>

</div>

@endsection