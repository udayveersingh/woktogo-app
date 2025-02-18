@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Maak een wachtwoord</h1>
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

    <form action="{{route('register.step3')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Wachtwoord<span style="color: red; font-weight: bold;">*</span></label>
            <input type="password" placeholder="Wachtwoord" name="password" class="bg-white rounded-xl px-5 py-4 text-sm" />
            @error('password')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
        <p class="text-sm mb-4 text-[#3C3C3C]">
            <strong>Jouw wachtwoord heeft tenminste</strong> <br />
            1 hoofdletter <br />
            1 speciale karakter (bijvoorbeeld: # ? ! &) <br />
            8 karakters <br />
        </p>

        <button class="bg-red rounded-xl px-5 py-3 text-xl font-bold w-full text-white">Volgende</button>

    </form>

</div>

@endsection