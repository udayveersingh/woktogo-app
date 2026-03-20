@extends('common.index')

@section('content')

<div class="bg-black text-white flex flex-col items-center relative min-h-dvh py-4">
    <img class="w-full object-cover h-full absolute top-0 left-0 opacity-30" src="{{ asset('images/signup_screen_bg.jpg') }}" alt="banner" />
    <a class="relative mb-4 md:mb-8" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>
  


<div class="px-5 py-4 max-w-[500px] w-full relative flex-auto flex flex-col justify-center">

<div class="my-auto">
    <h1 class="text-2xl md:text-4xl relative font-bold uppercase text-center mb-8">Maak een account</h1>

    <form action="{{route('register.step2')}}" method="post">
        @csrf
        <div class="flex flex-col gap-2 mb-4 mt-8">
            <label class="text-sm text-[#3C3C3C] hidden">E-mail<span style="color: red; font-weight: bold;">*</span></label>
            <input type="email" autocomplete="off" placeholder="naam@domein.com" name="email" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" />
            @error('email')
            <span class="invalid-feedback text-danger" style role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button class="bg-[#ff0511] rounded-full px-5 py-4 text-xl font-bold w-full text-white">Volgende</button>
    </form>

    <div class="text-center mt-7">
        <div class="mt-8"><span class="text-white/50 text-sm">Heb je al een account?</span> <a class="underline text-sm text-white" href="/">Log hier in.</a></div>
    </div>
</div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 

</div>
</div>

@endsection