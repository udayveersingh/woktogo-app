@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Mijn account aanpassen</h1>
</div>

<div class="px-5 py-4 max-w-[370px] mx-auto">

    <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-6">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>

    <div class="bg-white rounded-xl shadow-[2px_0_46px_0] shadow-[#00000029] px-8 pt-10 pb-6 flex flex-col">
        <div class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden">
            @if(Auth::user()->thumbnail)
            <img class="w-full object-cover h-full" src="{{asset(Auth::user()->thumbnail)}}" alt="user" />
            @endif
        </div>
        <div class="flex justify-between mt-5">
            <a href="{{ route('profile.edit') }}" class="text-black text-lg font-semibold">Bewerk profiel</a>
            <button onclick="window.location=`{{ url('profile/edit') }}`" class="font-bold text-xl"> > </button>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('password.change') }}" class="text-black text-lg font-semibold">Verander wachtwoord</a>
            <button onclick="window.location=`{{ url('change-password') }}`" class="font-bold text-xl"> > </button>
        </div>

        <!-- <div class="flex justify-between">
            <a href="#" class="text-black text-lg font-semibold">Help</a>
            <button class="font-bold text-xl"> > </button>
        </div> -->

        <a href="{{ route('logout') }}" class="text-white text-lg text-center w-full bg-red py-2 px-4 mt-36 rounded-md" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Log uit</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</div>

@endsection