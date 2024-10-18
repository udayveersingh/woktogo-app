<!-- resources/views/admin/edit_user.blade.php -->
@extends('admin.layouts.main')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>
    
       <!-- Display Success Message -->
    @if(session('success'))
       <div class="bg-green-500 text-white p-2 rounded mb-4">
           {{ session('success') }}
       </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
        </div>

        <div class="mb-4">
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" id="role" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                <option value="normal" {{ $user->role == 'normal' ? 'selected' : '' }}>Normal</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Update User</button>
    </form>
</div>
@endsection
