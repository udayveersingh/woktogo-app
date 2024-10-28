<!-- resources/views/admin/edit_user.blade.php -->
@extends('admin.layouts.main')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">View User</h1>

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>
        </div>

        <div class="mb-4"> {{$user->role}}
            <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->role) }}" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" disabled>

        </div>


        <table>
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($responses as $response)
                <tr>
                    <td>{{ $response->question_text }}</td>
                    <td>{{ $response->answer_text }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

</div>
@endsection
