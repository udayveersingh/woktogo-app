@extends('common.index')

@section('content')
<div class="px-5 py-12 max-w-[500px] mx-auto">

    <a href="{{$previous}}" class="rounded-full bg-red w-8 h-8 border-none inline-flex justify-center items-center mb-10">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('send-support-email') }}" method="POST">
        @csrf

        <input type="hidden" value="{{$previous}}" name="previous">
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Name:</label>
            <input type="name" name="name" autocomplete="off" placeholder="name" value="{{ old('name') }}" class="bg-white rounded-xl px-5 py-4 text-sm" />
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Email:</label>
            <input type="email" name="email" autocomplete="off" placeholder="email" value="{{ old('email') }}" class="bg-white rounded-xl px-5 py-4 text-sm" />
        </div>
        <div class="flex flex-col gap-2 mb-4">
            <label class="text-sm text-[#3C3C3C]">Message:</label>
            <textarea id="message" name="message" autocomplete="off" class="bg-white rounded-xl px-5 py-4 text-sm"></textarea>
        </div>

        <button class="bg-red rounded-xl px-5 py-4 text-xl font-bold w-full text-white" type="submit">Send Message</button>
    </form>
</div>

@endsection