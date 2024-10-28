@extends('admin.layouts.main')

@section('title', 'Edit Deal')

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-2xl font-semibold mb-4">Edit Deal</h1>

    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <li class="font-bold">Please fix the following errors:</li>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.deals.update', $deal->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
            <input type="text" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="title" name="title" value="{{ $deal->title }}" required>
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="description" name="description" rows="4" required>{{ $deal->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-medium mb-2">Price</label>
            <input type="number" step="0.01" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="price" name="price" value="{{ $deal->price }}" required>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-medium mb-2">Deal Image</label>
            <input type="file" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="image" name="image" accept="image/*">
            @if ($deal->image)
                <div class="mt-2">
                    <img src="{{ Storage::url($deal->image) }}" alt="Current Deal Image" class="w-32 h-32 object-cover rounded-md">
                </div>
            @endif
        </div>
        <div class="mb-4"> {{$deal->deadline}}
            {{-- {{ $deal->deadline ? $deal->deadline->format('Y-m-d') : '' }} --}}
            <label for="deadline" class="block text-gray-700 font-medium mb-2">Deadline</label>
            <input type="date" class="w-full border border-gray-300 p-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="deadline" name="deadline" value="">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Update Deal</button>
    </form>
</div>
@endsection
