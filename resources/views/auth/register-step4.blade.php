@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Algemene voorwaarden</h1>
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

    <form action="{{route('register.step5')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="flex gap-2"><input type="checkbox" name="receive_news_and_deals" value="1" /> Stuur me nieuws en deals van Wok to Go Rotterdam</label>
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="flex gap-2"><input type="checkbox" name="agree_terms" value="1" /> Akkoord algemene voorwaarden</label>
        </div>

        <button class="bg-red rounded-xl px-5 py-3 text-xl font-bold w-full text-white">Maak een account aan</button>

    </form>

</div>

@endsection