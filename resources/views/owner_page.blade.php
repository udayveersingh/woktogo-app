@extends('common.index')
<style>
    .deal-scan-btn {
        width: 330px;
        height: 109px;
        padding: 38px;
    }

    /* For Webkit-based browsers (Chrome, Safari, newer Edge) */
    /* input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    } */

    /* For Firefox */
    /* input[type="number"] {
        -moz-appearance: textfield;
    } */
</style>

@section('content')
<div class="md:min-h-full bg-yellow-500 flex flex-col items-center justify-between py-4">
    <!-- Header -->

    <!-- Content (Counters) -->
    <!-- <div class="w-full h-auto px-4 sm:px-6 max-w-sm">
        <div class="flex flex-col space-y-3"> -->

    <!-- Start Text -->
    <div class="flex flex-col space-y-2 px-4 mt-8">
        <!-- Reduced from text-3xl to text-2xl -->
        <h2 class="text-2xl font-bold"> Voer hier het bedrag in</h2>
        <!-- Increased from text-xs to text-sm -->
        <!-- <p class="text-xs"> Kies daarna op 'Begin met scannen'.<br> Of kies cijfercode invoeren als scannen niet lukt</p>  -->
    </div>
    <!-- Drink Counter -->
    <!-- <div class="flex items-center justify-between rounded-lg px-4 py-2"> -->
    <!-- Reduced from text-lg to text-base -->
    <!--   <div class="bg-secondary text-white text-base flex font-bold items-center justify-center rounded-lg py-12 px-8 min-w-36">Drinken</div> 
                <div class="flex flex-col items-center space-y-4">

                    <img src="{{ asset('svgicons/PlusIconGreen.svg')}}" onclick="increment('Drink')" alt="Add" class="w-[53px] h-[53px]">
                    <img src="{{ asset('svgicons/MinusIconRed.svg') }}" onclick="decrement('Drink')" alt="Subtract" class="w-[54px] h-[54px]">

                </div>
                <span id="count-display-Drink" class="text-black bg-white rounded-lg font-bold text-xl py-11 px-4">0</span> -->
    <!-- Reduced from text-2xl to text-xl -->
    <!-- <div id="drink" data-points="{{ $drinkPoint->points }}"></div>
            </div> -->

    <!-- Meal Counter -->
    <!-- <div class="flex items-center justify-between rounded-lg px-4 py-2"> -->
    <!-- Reduced from text-lg to text-base -->
    <!-- <div class="bg-secondary text-white text-base flex font-bold items-center justify-center rounded-lg py-12 px-8 min-w-36">Maaltijd</div> 
                <div class="flex flex-col items-center space-y-4">
                    <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" onclick="increment('Meal')" alt="Add" class="w-[53px] h-[53px]">
                    <img src="{{ asset('svgicons/MinusIconRed.svg') }}" onclick="decrement('Meal')" alt="Subtract" class="w-[54px] h-[54px]">
                </div> -->
    <!-- Reduced from text-2xl to text-xl -->
    <!-- <span id="count-display-Meal" class="text-black bg-white rounded-lg font-bold text-xl py-11 px-4">0</span> 
                <div id="meal" data-points="{{$mealPoint->points }}"></div>
            </div> -->

    <!-- Snack Counter -->
    <!-- <div class="flex items-center justify-between rounded-lg px-4 py-2"> -->
    <!-- Reduced from text-lg to text-base -->
    <!-- <div class="bg-secondary text-white text-base font-bold flex items-center justify-center rounded-lg py-12 px-8 min-w-36">Snack</div> 
                <div class="flex flex-col items-center space-y-4">
                    <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" onclick="increment('Snack')" alt="Add" class="w-[53px] h-[53px]">
                    <img src="{{ asset('svgicons/MinusIconRed.svg') }}" onclick="decrement('Snack')" alt="Subtract" class="w-[54px] h-[54px]">
                </div> -->
    <!-- Reduced from text-2xl to text-xl -->
    <!-- <span id="count-display-Snack" class="text-black bg-white rounded-lg font-bold text-xl py-11 px-4">0</span>
                <div id="snack" data-points="{{$Snack->points}}"></div>
            </div>
        </div>
    </div> -->

    <!-- Footer -->
    <form action="{{route('owner-scan-one')}}" method="POST" class="w-full">
        @csrf
        <div class="max-w-[365px] mx-auto py-4 px-6">
            <div class="text-gray-800 bg-white text-lg py-12 px-7 rounded-xl mb-4">
                <!-- Reduced from text-xl to text-lg -->
                <span class="text-lg font-bold">€</span>
                <!-- <span id="total-points" class="font-semibold">0</span> -->
                <input type="text" value="" placeholder=" Voer hier het bedrag in" class="z-50 border-gray-300 rounded-xl w-3/4 max-w-sm text-center focus:outline-none focus:border-transparent caret-red" name="total_points" id="totalPoints">
            </div>
            @session('error')
            <div class="bg-[#b91f25]/[0.5] rounded-xl border border-red p-1 text-white text-sm text-center my-1" role="alert">
                {{ $value }}
            </div>
            @endsession
            <button class="w-full bg-secondary text-lg text-white py-12 rounded-xl mt-4 font-bold" value="submit">Begin met scannen</button><br> <!-- Reduced from text-xl to text-lg -->
            <hr style="margin-top: 50px;">
        </div>
    </form>

    <div class="flex flex-col space-y-2 px-4 my-4 text-center">
        <a href="{{route('deal_scan_one') }}" class="deal-scan-btn bg-red rounded-xl px-5 text-xl font-bold text-white">Deal verzilveren</a> <!-- Reduced from text-xl to text-lg -->
    </div>

    <!-- Links -->
    <div class="flex flex-col space-y-2 px-4 my-4 text-center">
        <a class="underline text-sm">Lukt scannen niet?</a> <!-- Increased from default size to text-sm -->
        <a class="underline text-sm">Voer de cijfercode in</a> <!-- Increased from default size to text-sm -->
    </div>
    <!-- </form> -->
</div>

@endsection