@extends('common.index')

@section('content')
<div class="md:min-h-full bg-yellow-500 flex flex-col items-center justify-between py-4">
    <!-- Header -->
  
    <!-- Content (Counters) -->
    <div class="w-full h-auto px-4 sm:px-6 max-w-md">
      <div class="flex flex-col space-y-4">
        <!-- Drink Counter -->
        <div class="flex items-center justify-between rounded-lg px-4 py-2">
          <div class="bg-secondary text-white text-lg flex items-center justify-center rounded-lg py-12 px-8 min-w-32 md:min-w-[130px]">Drinken</div>
          <div class="flex flex-col items-center space-y-3">
            <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" alt="Add" class="w-16 h-16">
            <img src="{{ asset('svgicons/MinusIconRed.svg') }}" alt="Subtract" class="w-[53px] h-[53px]">
          </div>
          <span class="text-black bg-white rounded-md font-bold text-2xl py-10 px-4">2</span>
        </div>
  
        <!-- Meal Counter -->
        <div class="flex items-center justify-between rounded-lg px-4 py-2">
          <div class="bg-secondary text-white text-lg flex items-center justify-center rounded-lg py-12 px-8 min-w-32 md:min-w-[130px]">Maaltijd</div>
          <div class="flex flex-col items-center space-y-3">
            <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" alt="Add" class="w-16 h-16">
            <img src="{{ asset('svgicons/MinusIconRed.svg') }}" alt="Subtract" class="w-[53px] h-[53px]">
          </div>
          <span class="text-black bg-white rounded-md font-bold text-2xl py-10 px-4">2</span>
        </div>
  
        <!-- Snack Counter -->
        <div class="flex items-center justify-between rounded-lg px-4 py-2">
          <div class="bg-secondary text-white text-lg flex items-center justify-center rounded-lg py-12 px-8 min-w-32 md:min-w-[130px]">Snack</div>
          <div class="flex flex-col items-center space-y-3">
            <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" alt="Add" class="w-16 h-16">
            <img src="{{ asset('svgicons/MinusIconRed.svg') }}" alt="Subtract" class="w-[53px] h-[53px]">
          </div>
          <span class="text-black bg-white rounded-md font-bold text-2xl py-10 px-4">0</span>
        </div>
      </div>
    </div>
  
    <!-- Footer -->
    <div class="w-full px-4 sm:px-6 max-w-md py-4">
        <div class="text-center bg-white text-lg py-2 rounded-lg mb-4">Totale punten: 56</div>
        <button class="w-full bg-secondary text-white text-2xl py-4 rounded-lg">Begin met scannen</button>
    </div>
</div>
@endsection
