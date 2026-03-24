@extends('common.index')

@section('content')

<div class="bg-[#1e181c] text-white h-[135px] flex flex-col justify-center items-center relative">
    <!-- <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" /> -->
    
</div>

<div class="px-5 pb-4 max-w-[370px] mx-auto">
    
    <a href="{{ url()->previous() }}" class="rounded-full bg-[#ff0511] w-8 h-8 border-none flex justify-center items-center mb-6 mx-auto">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>

    <h1 class="text-3xl mb-8 uppercase font-bold text-white text-center">Mijn account aanpassen</h1>

    <div class="pt-5 pb-6 flex flex-col items-center">
        <div class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden">
            @if(Auth::user()->thumbnail)
            <img class="w-full object-cover h-full" src="{{asset(Auth::user()->thumbnail)}}" alt="user" />
            @endif
        </div>
        <div class="mt-5 w-full mb-2">
            <a href="{{ route('profile.edit') }}" class="text-white text-lg font-semibold flex justify-between gap-3 items-center border border-white rounded-lg px-5 py-2 hover:bg-white/10"><span>Bewerk profiel</span>
                <svg class="rotate-180" width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <g data-name="arrow-ios-back">
                            <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                            <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                        </g>
                    </g>
                </svg>
            </a>
        </div>

        <div class="w-full">
            <a href="{{ route('password.change') }}" class="text-white text-lg font-semibold flex justify-between gap-3 items-center border border-white rounded-lg px-5 py-2 hover:bg-white/10"><span>Verander wachtwoord</span>
            
                <svg class="rotate-180" width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g data-name="Layer 2">
                        <g data-name="arrow-ios-back">
                            <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                            <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                        </g>
                    </g>
                </svg>
            </a>
        </div>

        <!-- <div class="flex justify-between">
            <a href="#" class="text-black text-lg font-semibold">Help</a>
            <button class="font-bold text-xl"> > </button>
        </div> -->

        <a href="{{ route('logout') }}" class="text-white text-lg text-center w-full bg-[#ff0511] rounded-full py-2 px-4 mt-10" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Log uit</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</div>

@endsection