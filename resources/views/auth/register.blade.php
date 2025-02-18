@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Maak een account</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">




    <form action="{{route('register.step2')}}" method="post">
        @csrf
        <div class="flex flex-col gap-2 mb-4 mt-8">
            <label class="text-sm text-[#3C3C3C]">E-mail<span style="color: red; font-weight: bold;">*</span></label>
            <input type="email" autocomplete="off" placeholder="naam@domein.com" name="email" class="bg-white rounded-xl px-5 py-4 text-sm" />
            @error('email')
            <span class="invalid-feedback text-danger" style role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>
        <button class="bg-red rounded-xl px-5 py-4 text-xl font-bold w-full text-white">Volgende</button>
    </form>

    <div class="text-center mt-7">
        <div class="mt-8">Heb je al een account? <a class="underline text-white" href="/">Log hier in.</a></div>
    </div>

</div>

@endsection