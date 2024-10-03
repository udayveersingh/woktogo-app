@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Login</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">

    <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-20">
    <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">  <g data-name="Layer 2">  <g data-name="arrow-ios-back">  <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>  <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path></g></g></svg>
    </a>

    <div class="mb-4">
        <h2 class="text-base font-bold">Voer jouw e-mail adres in</h2>
        <p class="text-sm">Je ontvangt een link om een nieuw wachtwoord in te voeren.</p>
    </div>

    <form>
        <div class="flex flex-col gap-2 mb-4">
            <input type="E-mail" autocomplete="off" placeholder="E-mail of gebruikersnaam" class="bg-white rounded-xl px-5 py-4 text-sm"  />
        </div>
       
        <button class="bg-red rounded-xl px-5 py-3 text-xl font-bold w-full text-white">Verzenden</button>

    </form>

</div>

@endsection