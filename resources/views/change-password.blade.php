@extends('common.index')

@section('content')
<div class="max-w-sm mt-10 mx-4 md:mx-auto p-4 md:p-6 shadow-lg rounded-md">

<a href="{{route('my-account')}}" class="rounded-full bg-[#ff0511] w-8 h-8 border-none flex mx-auto justify-center items-center mb-6">
        <svg width="24" height="24" fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <g data-name="Layer 2">
                <g data-name="arrow-ios-back">
                    <rect width="24" height="24" transform="rotate(90 12 12)" opacity="0"></rect>
                    <path d="M13.83 19a1 1 0 0 1-.78-.37l-4.83-6a1 1 0 0 1 0-1.27l5-6a1 1 0 0 1 1.54 1.28L10.29 12l4.32 5.36a1 1 0 0 1-.78 1.64z"></path>
                </g>
            </g>
        </svg>
    </a>
    <h1 class="text-3xl mb-8 uppercase font-bold text-white text-center pb-4">Change Password</h1>

    @if(session('success'))
    <div class="bg-green-500 p-4 mb-4 rounded text-sm text-center">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red p-4 mb-4 rounded text-sm">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-white text-center">Current Password</label>
            <input type="password" id="current_password" name="current_password" required class="mt-1 block rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center w-full" style="background:transparent" />
        </div>

        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-white text-center">New Password</label>
            <input type="password" id="new_password" name="new_password" required class="mt-1 block rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center w-full" style="background:transparent" />
        </div>

        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-sm font-medium text-white text-center">Confirm New Password</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="mt-1 rounded-full autofill:bg-transparent border-2 placeholder:text-white border-white px-5 py-4 text-sm text-white text-center w-full" style="background:transparent" />
        </div>

        <button type="submit" class="bg-[#ff0511] rounded-full px-5 py-4 text-lg md:text-xl font-bold w-full text-white">Change Password</button>
    </form>
</div>
@endsection