@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Mijn deals</h1>
</div>

<div class="px-5 py-4 max-w-[370px] mx-auto">

    <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-4">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>



    <div class="flex flex-col gap-7">
        <div class="flex flex-col rounded-lg text-center overflow-hidden group relative dealCardWrapper">
            <div class="card-front bg-secondary">
                <div class="py-10 text-white">
                    <img src="{{ asset('images/barcode.png') }}" alt="deal" class="max-w-10 mx-auto mb-5" />
                    <div class="text-2xl mb-5">Problemen met scannen?</div>
                    <div class="text-sm">cijfercode</div>
                    <div class="text-xl font-bold tracking-wider">CF 045 699</div>
                </div>
                <div class="bg-white p-6 text-left">
                    <h2 class="font-normal text-xl mb-1">Hoe en waar te scannen</h2>
                    <p class="text-[12px] mb-2 text-gray-600">Houd jouw telefoon op 7-10 cm afstand van de scanner. Wanneer de code is gescand, hoor je een piep en verschijnt een bevestigingsbericht.</p>
                    <h2 class="font-normal text-xl mb-1">Als scannen niet werkt</h2>
                    <p class="text-[12px] text-gray-600 mb-4">Als het scannen niet werkt, geef dan de cijfercode mondelings door aan de medewerker.</p>

                </div>
            </div>
        </div><!--/Deal card -->

        <div class="flex flex-col rounded-lg text-center overflow-hidden group relative dealCardWrapper">
            <div class="bg-secondary">
                <div class="py-12 font-bold text-xl text-white">
                    Punten sparen
                </div>
                <div class="bg-white p-6 text-left">
                    <h2 class="font-normal text-xl mb-1">Hoe werken punten</h2>
                    <p class="text-[12px] text-gray-600">
                        Je krijgt 1 punt bij elk bestelde drankje <br />
                        Je krijgt 2 punten bij elke bestelde snack <br />
                        Je krijgt 5 punten bij elk menu plus een drankje <br /><br />
                        Bij 200 punten kan je een gratis maaltijd naar keuze bestellen.</p>
                </div>
            </div>

        </div><!--/Deal card -->


    </div>

</div>

@endsection