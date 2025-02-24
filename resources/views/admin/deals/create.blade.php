@extends('admin.layouts.main')

@section('title', 'Create New Deal')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold">Create New Deal</h1>
    <form action="{{ route('admin.deals.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" required class="mt-1 block w-full p-2 border rounded" placeholder="Deal Title">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" required class="mt-1 block w-full p-2 border rounded" placeholder="Deal Description"></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label for="points" class="block text-sm font-medium text-gray-700">Points</label>
            <input type="number" name="points" id="points" class="mt-1 block w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label for="deadline" class="block text-sm font-medium text-gray-700">Deadline</label>
            <input type="date" name="deadline" id="deadline" class="mt-1 block w-full p-2 border rounded" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition duration-300">Create Deal</button>
    </form>
</div>
@endsection