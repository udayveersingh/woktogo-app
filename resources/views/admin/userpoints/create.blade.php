@extends('admin.layouts.main')

@section('title', 'Point System')
@section('content')
<div class="container">
    <h1>Create Points</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.points.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-3">
            <label for="description" class="block text-sm font-medium text-gray-700">Description (e.g., Meal and Drink)</label>
            <input type="text" class="mt-1 block w-full p-2 border rounded" id="description" name="description" required>
        </div>
        <div class="mb-3">
            <label for="points" class="block text-sm font-medium text-gray-700">Points</label>
            <input type="number" class="mt-1 block w-full p-2 border rounded" id="points" name="points" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition duration-300">Create Points</button>
    </form>
</div>
@endsection
