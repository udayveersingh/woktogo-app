@extends('common.index')

@section('content')
<div class="max-w-sm mt-24 mx-4 md:mx-auto p-4 md:p-6 bg-white shadow-lg rounded-md">
    <h1 class="text-2xl font-semibold pb-6">Change Password</h1>

    @if(session('success'))
    <div class="bg-green-500 p-4 mb-4 rounded">
        {{ session('success') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="bg-red p-4 mb-4 rounded">
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
            <label for="current_password" class="block text-sm font-medium">Current Password</label>
            <input type="password" id="current_password" name="current_password" required class="mt-1 block w-full p-2 border border-gray-300 rounded" />
        </div>

        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium">New Password</label>
            <input type="password" id="new_password" name="new_password" required class="mt-1 block w-full p-2 border border-gray-300 rounded" />
        </div>

        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-sm font-medium">Confirm New Password</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" required class="mt-1 block w-full p-2 border border-gray-300 rounded" />
        </div>

        <button type="submit" class="bg-red rounded-xl px-5 py-4 text-lg md:text-xl font-bold w-full text-white">Change Password</button>
    </form>
</div>
@endsection