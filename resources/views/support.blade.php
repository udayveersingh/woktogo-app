@extends('common.index')

@section('content')

<div class="bg-black text-white flex flex-col items-center relative min-h-dvh py-4">
    <img class="w-full object-cover h-full absolute top-0 left-0 opacity-30" src="{{ asset('images/signup_screen_bg.jpg') }}" alt="banner" />
    <a class="relative mb-4 md:mb-8" href="/public"><img class="h-[55px]" src="{{ asset('images/logo.webp') }}" alt="" /></a>
  


<div class="px-5 py-4 max-w-[500px] w-full relative flex-auto flex flex-col justify-center">

<div class="my-auto">
    <a href="{{$previous}}" class="rounded-full bg-[#ff0511] w-8 h-8 border-none flex justify-center items-center mb-8 mx-auto">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>
    <h1 class="text-2xl md:text-4xl relative font-bold uppercase text-center mb-8">Support</h1>


    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('send-support-email') }}" method="POST">
        @csrf

        <input type="hidden" value="{{$previous}}" name="previous">
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C] hidden">Name:</label>
            <input type="name" name="name" autocomplete="off" placeholder="Name" value="{{ old('name') }}" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" />
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C] hidden">Email:</label>
            <input type="email" name="email" autocomplete="off" placeholder="Email" value="{{ old('email') }}" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center" style="background:transparent !important" />
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C] hidden">Message:</label>
            <textarea id="message" name="message" placeholder="Message" autocomplete="off" class="rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center resize-none" style="background:transparent !important"></textarea>
        </div>

        <button class="bg-[#ff0511] rounded-full px-5 py-4 text-xl font-bold w-full text-white" type="submit">Send Message</button>
    </form>


</div>


    <div class="mt-auto text-center text-xs pt-4">
        <a class="px-2" href="{{route('voorwaarden')}}"><u>Algemene Voorwaarden</u></a> | <a class="px-2" href="{{route('privacy')}}"><u>Privacy</u></a> 
    </div> 

</div>
</div>

@endsection