@extends('common.index')

@section('content')
<div class="px-5 py-12 max-w-[500px] mx-auto">

    <form action="{{ route('send-support-email') }}" method="POST">
        @csrf

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
            <textarea  id="message" name="message" autocomplete="off" class="bg-white rounded-xl px-5 py-4 text-sm"></textarea>
        </div>

        <button class="bg-red rounded-xl px-5 py-4 text-xl font-bold w-full text-white" type="submit">Send Message</button>
    </form>
</div>

@endsection