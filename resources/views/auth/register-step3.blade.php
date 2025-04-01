@extends('common.index')

@section('content')

<div class="bg-black text-white h-[135px] flex flex-col justify-center items-center relative">
    <img class="w-full object-cover h-full absolute opacity-30" src="{{ asset('images/banner.webp') }}" alt="banner" />
    <h1 class="text-2xl relative">Maak een wachtwoord</h1>
</div>

<div class="px-5 py-12 max-w-[500px] mx-auto">

    <a href="{{ url()->previous() }}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-10">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>
    <div class="flex flex-col gap-1 mb-4">
        <h3 class="text-lg font-bold"> Dit is niet verplicht</h3>
        <p class="text-sm">
            Maar het helpt ons betere deals voor je te maken.
        </p>
    </div>

    <form action="{{route('register.step4')}}" method="POST">
        @csrf
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Naam</label>
            <input type="text" placeholder="Dit is jouw profielnaam" name="name" class="bg-white rounded-xl px-5 py-4 text-sm" value="{{ old('name') }}" />
            @error('name')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Geboortedatum</label>
            <div class="flex gap-2">
                <input type="date" name="date_of_birth" placeholder="21" class="w-full bg-white rounded-xl px-5 py-4 text-sm" value="{{ old('date_of_birth') }}" />
                <!-- <input type="text" placeholder="21" class="w-full bg-white rounded-xl px-5 py-4 text-sm"  />
                <input type="text" placeholder="Juni" class="w-full bg-white rounded-xl px-5 py-4 text-sm"  />
                <input type="text" placeholder="1999" class="w-full bg-white rounded-xl px-5 py-4 text-sm"  /> -->
            </div>
            @error('date_of_birth')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
            @enderror
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Gelacht</label>
            <select class="bg-white rounded-xl px-5 py-4 text-sm" name="gender">
                <option value="">selecteren</option>
                <option value="vrouw">Vrouw</option>
                <option value="man">Man</option>
                <option value="ik wil het niet zeggen">Ik wil het niet zeggen</option>
            </select>
        </div>

        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Telefoonnummer</label>
            <input type="number" placeholder="Telefoonnummer" name="phone" class="bg-white rounded-xl px-5 py-4 text-sm" value="{{old('phone')}}" />
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
            <label class="text-base font-bold text-[#3C3C3C] mb-2">
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
    <label class="text-base font-bold text-[#3C3C3C] mb-2">
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
            <label class="text-base font-bold text-[#3C3C3C] mb-2">
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

        <button class="bg-red rounded-xl px-5 py-3 text-xl font-bold w-full text-white">Volgende</button>

        </form>

        </div>

        @endsection