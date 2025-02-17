@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Login</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">


    @session('error')
    <div class="bg-[#b91f25]/[0.5] rounded-xl border border-red p-1 text-white text-sm text-center my-1" role="alert">
        {{ $value }}
    </div>
    @endsession

    @session('success')
    <div class="bg-[#196450]/[0.5] rounded-xl border border-secondary p-1 text-white text-sm text-center my-1" role="alert">
        {{ $value }}
    </div>
    @endsession


    <form action="{{route('login.post')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">E-mail of gebruikersnaam</label>
            <input type="email" name="email" autocomplete="off" placeholder="E-mail of gebruikersnaam" class="bg-white rounded-xl px-5 py-4 text-sm" />
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Wachtwoord</label>
            <input type="password" name="password" placeholder="Wachtwoord" class="bg-white rounded-xl px-5 py-4 text-sm" />
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="flex flex-col gap-2 mb-4">
            <label class="flex gap-2"><input type="checkbox" /> Onthoud mij</label>
        </div>

        <button class="bg-red rounded-xl px-5 py-4 text-xl font-bold w-full text-white">Login</button>

    </form>

    <div class="text-center mt-7">
        <a href="{{ route('password.request') }}" class="underline">Wachtwoord vergeten?</a>
        <div class="mt-8">Geen account? <a class="underline text-white" href="/register">Maak een account aan</a></div>
    </div>
    

</div>

@endsection