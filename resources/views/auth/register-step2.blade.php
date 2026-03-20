@extends('common.index')

@section('content')
<div class="bg-black text-white flex flex-col items-center relative min-h-dvh py-4">
    <img class="w-full object-cover h-full absolute top-0 left-0 opacity-30" src="{{ asset('images/signup_screen_bg.jpg') }}" alt="banner" />
    <a class="relative mb-4 md:mb-8" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>
  


<div class="px-5 py-4 max-w-[500px] w-full relative flex-auto flex flex-col justify-center">

<div class="my-auto">
    <a href="{{ url()->previous() }}" class="rounded-full bg-[#ff0511] w-8 h-8 border-none flex justify-center items-center mb-8 mx-auto">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>
    <h1 class="text-2xl md:text-4xl relative font-bold uppercase text-center mb-8">Maak een wachtwoord</h1>


    <form action="{{route('register.step3')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C] hidden">Wachtwoord<span style="color: red; font-weight: bold;">*</span></label>
            <input type="password" placeholder="Wachtwoord" name="password" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" />
            @error('password')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
        <p class="text-sm mb-4 text-white/50">
            <strong>Jouw wachtwoord heeft tenminste</strong> <br />
            1 hoofdletter <br />
            1 speciale karakter (bijvoorbeeld: # ? ! &) <br />
            8 karakters <br />
        </p>

        <button class="bg-[#ff0511] rounded-full px-5 py-3 text-xl font-bold w-full text-white">Volgende</button>

    </form>

</div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 

</div>
</div>

@endsection