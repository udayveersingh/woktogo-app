@extends('common.index')

@section('content')
<div class="md:min-h-full bg-yellow-500 flex flex-col items-center justify-between py-4">
    <!-- Header -->

    <!-- Content (Counters) -->
    <div class="w-full h-auto px-4 sm:px-6 max-w-sm">
        <div class="flex flex-col space-y-3">

            <!-- Start Text -->
            <div class="flex flex-col space-y-2 px-4 mt-8">
                <h2 class="text-2xl font-bold">Voer aantallen in</h2> <!-- Reduced from text-3xl to text-2xl -->
                <p class="text-xs"> Kies daarna op 'Begin met scannen'.<br> Of kies cijfercode invoeren als scannen niet lukt</p> <!-- Increased from text-xs to text-sm -->
            </div>
            <!-- Drink Counter -->
            <div class="flex items-center justify-between rounded-lg px-4 py-2">
                <div class="bg-secondary text-white text-base flex font-bold items-center justify-center rounded-lg py-12 px-8 min-w-36">Drinken</div> <!-- Reduced from text-lg to text-base -->
                <div class="flex flex-col items-center space-y-4">
                    <img src="{{ asset('svgicons/PlusIconGreen.svg')}}" onclick="increment('Drink')" alt="Add" class="w-[54px] h-[54px]">
                    <img src="{{ asset('svgicons/MinusIconRed.svg') }}" onclick="decrement('Drink')" alt="Subtract" class="w-[53px] h-[53px]">
                </div>
                <span id="count-display-Drink" class="text-black bg-white rounded-lg font-bold text-xl py-11 px-4">0</span> <!-- Reduced from text-2xl to text-xl -->
            </div>

            <!-- Meal Counter -->
            <div class="flex items-center justify-between rounded-lg px-4 py-2">
                <div class="bg-secondary text-white text-base flex font-bold items-center justify-center rounded-lg py-12 px-8 min-w-36">Maaltijd</div> <!-- Reduced from text-lg to text-base -->
                <div class="flex flex-col items-center space-y-4">
                    <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" onclick="increment('Meal')" alt="Add" class="w-[54px] h-[54px]">
                    <img src="{{ asset('svgicons/MinusIconRed.svg') }}" onclick="decrement('Meal')" alt="Subtract" class="w-[53px] h-[53px]">
                </div>
                <span id="count-display-Meal" class="text-black bg-white rounded-lg font-bold text-xl py-11 px-4">0</span> <!-- Reduced from text-2xl to text-xl -->
            </div>

            <!-- Snack Counter -->
            <div class="flex items-center justify-between rounded-lg px-4 py-2">
                <div class="bg-secondary text-white text-base font-bold flex items-center justify-center rounded-lg py-12 px-8 min-w-36">Snack</div> <!-- Reduced from text-lg to text-base -->
                <div class="flex flex-col items-center space-y-4">
                    <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" onclick="increment('Snack')" alt="Add" class="w-[54px] h-[54px]">
                    <img src="{{ asset('svgicons/MinusIconRed.svg') }}" onclick="decrement('Snack')" alt="Subtract" class="w-[53px] h-[53px]">
                </div>
                <span id="count-display-Snack" class="text-black bg-white rounded-lg font-bold text-xl py-11 px-4">0</span> <!-- Reduced from text-2xl to text-xl -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="max-w-[23rem] py-4 px-6 w-full">
        <div class="flex justify-between text-gray-800 bg-white text-lg py-2.5 px-7 rounded-xl mb-4"> <!-- Reduced from text-xl to text-lg -->
            <span>Totale punten </span>
            <span id="total-points" class="font-semibold">0</span>
        </div>
        <button onclick="window.location=`{{ url('owner-scan-one') }}`" class="w-full bg-secondary text-lg text-white py-8 rounded-xl mt-4 font-bold">Begin met scannen</button> <!-- Reduced from text-xl to text-lg -->
    </div>

    <!-- Links -->
    <div class="flex flex-col space-y-2 px-4 my-4 text-center">
        <a class="underline text-sm">Lukt scannen niet?</a> <!-- Increased from default size to text-sm -->
        <a class="underline text-sm">Voer de cijfercode in</a> <!-- Increased from default size to text-sm -->
    </div>
</div>

@endsection