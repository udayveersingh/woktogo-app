@extends('common.index')

@section('content')
<div class="min-h-full bg-yellow-500 flex flex-col items-center justify-between py-4">
    <!-- Header -->
  
    <!-- Content (Counters) -->
    <div class="w-full h-auto px-6 max-w-md">
      <div class="flex flex-col space-y-4">
        <!-- Drink Counter -->
        <div class="flex items-center justify-between rounded-lg px-4 py-2">
          <div class="bg-secondary text-white text-lg flex items-center justify-center rounded-lg py-10 px-10">Drinken</div>
          <div class="flex flex-col items-center">
          <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" alt="Add" class="w-16 h-16">
          <img src="{{ asset('svgicons/MinusIconRed.svg') }}" alt="Add" class="w-[52px] h-[52px]">
          </div>
          <span class="text-black bg-white rounded-md font-bold text-xl py-10 px-6">2</span>
        </div>
  
        <!-- Meal Counter -->
        <div class="flex items-center justify-between rounded-lg px-4 py-2">
          <div class="bg-secondary text-white text-lg flex items-center justify-center py-10 px-10 rounded-lg">Maaltijd</div>
          <div class="flex flex-col items-center">
          <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" alt="Add" class="w-16 h-16">
          <img src="{{ asset('svgicons/MinusIconRed.svg') }}" alt="Add" class="w-[52px] h-[52px]">
          </div>
          <span class="text-black bg-white rounded-md font-bold text-xl py-10 px-6">2</span>
        </div>
  
        <!-- Snack Counter -->
        <div class="flex items-center justify-between rounded-lg px-4 py-2">
          <div class="bg-secondary text-white text-lg flex items-center justify-center py-10 px-10 rounded-lg">Snack</div>
          <div class="flex flex-col items-center">
          <img src="{{ asset('svgicons/PlusIconGreen.svg') }}" alt="Add" class="w-16 h-16">
          <img src="{{ asset('svgicons/MinusIconRed.svg') }}" alt="Add" class="w-[52px] h-[52px]">
          </div>
          <span class="text-black bg-white rounded-md font-bold text-xl py-10 px-6">0</span>
        </div>
      </div>
    </div>
  
    <!-- Footer -->
    <div class="w-full px-6 max-w-md py-16">
        <div class="text-center bg-white text-lg py-2 rounded-lg mb-4">Totale punten: 56</div>
        <button class="w-full bg-secondary text-white text-2xl px-2 py-8 rounded-lg">Begin met scannen</button>
    </div>
</div>
@endsection
