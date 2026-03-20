@extends('common.index')

@section('content')
<div class="bg-black text-white flex flex-col items-center relative min-h-dvh py-4">
    <img class="w-full object-cover h-full fixed top-0 bottom-0 left-0 opacity-30" src="{{ asset('images/signup_screen_bg.jpg') }}" alt="banner" />
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


    <div class="flex flex-col gap-1 mb-4">
        <h3 class="text-lg font-bold"> Dit is niet verplicht</h3>
        <p class="text-sm">
            Maar het helpt ons betere deals voor je te maken.
        </p>
    </div>


    <form action="{{route('register.step4')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-white">Naam</label>
            <input type="text" placeholder="Dit is jouw profielnaam" name="name" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" value="{{ old('name') }}" />
            @error('name')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-white">Geboortedatum</label>
            <div class="flex gap-2">
                <input type="date" name="date_of_birth" placeholder="21" class="w-full rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" min="1900-01-01" max="2025-12-31" value="{{ old('date_of_birth') }}" />
            </div>
            @error('date_of_birth')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-white">Gelacht</label>
            <select class="rounded-full bg-white border-2  border-white px-5 py-4 text-sm text-black text-center" name="gender">
                <option value="">selecteren</option>
                <option value="vrouw">Vrouw</option>
                <option value="man">Man</option>
                <option value="ik wil het niet zeggen">Ik wil het niet zeggen</option>
            </select>
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-white">Telefoonnummer</label>
            <input type="number" placeholder="Telefoonnummer" name="phone" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" value="{{old('phone')}}" />
            @error('phone')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        @php
        $i = 1;
        @endphp
        @foreach ($formattedQuestions as $key=>$question)
        @if($key < 2)
            <div class="flex flex-col gap-1 mb-4">
            <label class="text-base font-semibold text-white/60 mb-2">
                {{$i++}}. {{ $question['question_text'] }}
            </label>
            @foreach ($question['options'] as $index => $option)
            @if($index < 3)
                <label class="flex gap-2">
                <input type="radio" name="responses[{{ $question['question_id'] }}][]" value="{{ $option['option_id'] }}" />
                {{ $option['option_text'] }}
                </label>
                @endif
                @endforeach
</div>
@elseif($key < 5)
    <div class="flex flex-col gap-1 mb-4">
    <label class="text-base font-semibold text-white/60 mb-2">
        {{$i++}}. {{ $question['question_text'] }}
    </label>
    @foreach ($question['options'] as $index => $option)
    @if($index < 4)
        <label class="flex gap-2">
        <input type="checkbox" name="responses[{{ $question['question_id'] }}][]" value="{{ $option['option_id'] }}" />
        {{ $option['option_text'] }}
        </label>
        @endif
        @endforeach
        </div>
        @elseif($key == 5)
        <div class="flex flex-col gap-1 mb-4">
            <label class="text-base font-semibold text-white/60 mb-2">
                {{$i++}}. {{ $question['question_text'] }}
            </label>
            @foreach ($question['options'] as $index => $option)
            @if($index < 3)
                <label class="flex gap-2">
                <input type="radio" name="responses[{{ $question['question_id'] }}][]" value="{{ $option['option_id'] }}" />
                {{ $option['option_text'] }}
                </label>
                @endif
                @endforeach
        </div>
        @endif
        @endforeach

        <button class="bg-[#ff0511] rounded-full px-5 py-3 text-xl font-bold w-full text-white">Volgende</button>

        </form>


</div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 

</div>
</div>

        @endsection