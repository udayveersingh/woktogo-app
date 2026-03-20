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
    <h1 class="text-2xl md:text-4xl relative font-bold uppercase text-center mb-8">Algemene voorwaarden</h1>


    <form action="{{route('register.step5')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="flex gap-2 items-center cursor-pointer group relative">
                    <input type="checkbox" name="receive_news_and_deals" value="1" class="peer hidden" />
                    
                <span class="w-5 h-5 rounded-full border-2 border-gray-300 
                            peer-checked:border-white peer-checked:bg-white/10
                            transition-all duration-200">
                </span>

            <svg class="w-2.5 h-2.5 text-white absolute left-[5px] 
                        hidden peer-checked:block" 
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
                fill="none" stroke="currentColor" stroke-width="3" 
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>

            <span class="text-white/50">Stuur me nieuws en deals van Wok to Go Rotterdam</span>
                    
            </label>


        </div>

        <div class="flex flex-col gap-2 mb-8">

            <label class="flex gap-2 items-center cursor-pointer group relative">
                    <input type="checkbox" name="agree_terms" value="1" class="peer hidden" />
                    
                <span class="w-5 h-5 rounded-full border-2 border-gray-300 
                            peer-checked:border-white peer-checked:bg-white/10
                            transition-all duration-200">
                </span>

            <svg class="w-2.5 h-2.5 text-white absolute left-[5px] 
                        hidden peer-checked:block" 
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" 
                fill="none" stroke="currentColor" stroke-width="3" 
                stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
            </svg>

            <span class="text-white/50">Akkoord algemene voorwaarden<span style="color: red; font-weight: bold;">*</span></span>
                    
            </label>



            @error('agree_terms')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <button class="bg-[#ff0511] rounded-full px-5 py-3 text-xl font-bold w-full text-white">Maak een account aan</button>

    </form>

</div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 

</div>
</div>

@endsection