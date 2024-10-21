@extends('common.index')

@section('content')
<div class="min-h-screen bg-yellow-500 flex flex-col items-center justify-between py-4">
    <!-- Header -->
  
    <!-- Content (Counters) -->
    <div class="w-full px-6 max-w-md">
      <div class="flex flex-col space-y-4">
        <!-- Drink Counter -->
        <div class="flex items-center justify-between  rounded-lg px-4 py-2">
          <div class="text-white text-lg bg-secondary max-w-2xl">Drinken</div>
          <div class="flex items-center space-x-2">
            <button class="bg-red-600 text-white text-lg font-bold w-8 h-8 rounded-full">-</button>
            <span class="text-white text-xl">2</span>
            <button class="bg-green-500 text-white text-lg font-bold w-8 h-8 rounded-full">+</button>
          </div>
        </div>
  
        <!-- Meal Counter -->
        <div class="flex items-center justify-between  rounded-lg px-4 py-2">
          <div class="text-white text-lg bg-secondary py-5 px-5">Maaltijd</div>
          <div class="flex items-center space-x-2">
            <button class="bg-red-600 text-white text-lg font-bold w-8 h-8 rounded-full">-</button>
            <span class="text-white text-xl">2</span>
            <button class="bg-green-500 text-white text-lg font-bold w-8 h-8 rounded-full">+</button>
          </div>
        </div>
  
        <!-- Snack Counter -->
        <div class="flex items-center justify-between  rounded-lg px-4 py-2">
          <div class="text-white text-lg bg-secondary py-5 px-5">Snack</div>
          <div class="flex items-center space-x-2">
            <button class="bg-red-600 text-white text-lg font-bold w-8 h-8 rounded-full">-</button>
            <span class="text-white text-xl">0</span>
            <button class="bg-green-500 text-white text-lg font-bold w-8 h-8 rounded-full">+</button>
          </div>
        </div>
      </div>
    </div>
  
    <!-- Footer -->
    <div class="w-full px-6 max-w-md">
      <div class="text-center bg-white text-lg py-2 rounded-lg mb-4">Totale punten: 56</div>
      <button class="w-full bg-green-700 text-white text-lg py-3 rounded-lg">Begin met scannen</button>
    </div>
  </div>
  

@endsection
