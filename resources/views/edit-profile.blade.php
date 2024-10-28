<!-- resources/views/profile/edit.blade.php -->

@extends('common.index')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-md">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Name field -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Thumbnail field -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="thumbnail">Profile Picture</label>
            <input type="file" id="thumbnail" name="thumbnail"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('thumbnail')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            @if($user->thumbnail)
            <div class="mt-4">
                <p>Current Thumbnail:</p>
                <img src="{{ Storage::url($user->thumbnail) }}" alt="User Thumbnail" class="w-20 h-20 rounded-full">
            </div>
            @endif
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-red rounded-xl px-5 py-4 text-xl font-bold w-full text-white">
                Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
