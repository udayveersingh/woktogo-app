@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Login</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">

    <form>
        <div class="flex flex-col gap-2 mb-4 mt-8">
            <label class="text-sm text-[#3C3C3C]">Nieuw wachtwoord</label>
            <input type="password" placeholder="Wachtwoord" class="bg-white rounded-xl px-5 py-4 text-sm"  />
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Herhaal wachtwoord</label>
            <input type="password" placeholder="Wachtwoord" class="bg-white rounded-xl px-5 py-4 text-sm"  />
        </div>
       
        <button class="bg-red rounded-xl px-5 py-3 text-xl font-bold w-full text-white">Verzenden</button>

    </form>

</div>

@endsection