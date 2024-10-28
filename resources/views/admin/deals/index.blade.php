@extends('admin.layouts.main')

@section('title', 'Deal Management')

@section('content') <!-- Start the content section -->
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Deals</h1>
    <a href="{{ route('admin.deals.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Create New Deal</a>
    
    <table class="min-w-full mt-6 bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b">Image</th>
                <th class="py-2 px-4 border-b">Title</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Deadline</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deals as $deal)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4">
                    @if($deal->image)
                        <img src="{{ asset($deal->image) }}" alt="Deal Image" class="w-16 h-16 object-cover">
                    @else
                        No Image
                    @endif
                </td>
                <td class="py-2 px-4">{{ $deal->title }}</td>
                <td class="py-2 px-4">{{ $deal->description }}</td>
                <td class="py-2 px-4">{{ $deal->deadline ? \Carbon\Carbon::parse($deal->deadline)->format('M d, Y') : 'No Deadline' }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('admin.deals.edit', $deal->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('admin.deals.destroy', $deal->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection <!-- End the content section -->
