@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Mijn account aanpassen</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">

    <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-20">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>

    <div class="bg-white rounded-xl shadow-[2px_0_46px_0] shadow-[#00000029] p-8 flex flex-col gap-7">
        <div class="w-20 h-20 rounded-full bg-gray-200 overflow-hidden">
            <img class="w-full object-cover h-full" src="{{ Storage::url(auth()->user()->thumbnail) }}" alt="user" />
        </div>
        <a href="{{ route('profile.edit') }}" class="text-black text-lg">Bewerk profiel</a>
        <a href="{{ route('password.change') }}" class="text-black text-lg">Verander wachtwoord</a>
        <a href="#" class="text-black text-lg">Help</a>
        <a href="{{ route('logout') }}" class="text-red text-lg"   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">Log uit</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
    </div>

</div>

@endsection