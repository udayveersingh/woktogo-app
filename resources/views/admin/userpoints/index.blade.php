@extends('admin.layouts.main')

@section('title', 'Point System')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Points Entries</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full mt-6 bg-white border border-gray-200 my-10">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Identifier</th>
                <th class="py-2 px-4 border-b">Description</th>
                <th class="py-2 px-4 border-b">Points</th>
                <th class="py-2 px-4 border-b">Created At</th>
                <th class="py-2 px-4 border-b">Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($points as $point)
                <tr class="border-b hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $point->id }}</td>
                    <td class="py-2 px-4">{{ $point->identifier }}</td>
                    <td class="py-2 px-4">{{ $point->description }}</td>
                    <td class="py-2 px-4">{{ $point->points }}</td>
                    <td class="py-2 px-4">{{ $point->created_at }}</td>
                    <td class="py-2 px-4">{{ $point->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.points.create') }}" class="bg-blue-500 text-white px-4 py-2  rounded-md hover:bg-blue-600 transition duration-300">Add New Points Entry</a>
</div>
@endsection
