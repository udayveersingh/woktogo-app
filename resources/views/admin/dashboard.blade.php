@extends('admin.layouts.main')

@section('title', 'Users Management')

@section('content')
    <!-- Dashboard Content -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            
            <!-- Stats Card 1 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
                    <div class="text-3xl font-bold text-blue-500">245</div>
                </div>
                <div class="mt-2 text-sm text-gray-500">Compared to last month</div>
            </div>

            <!-- Stats Card 2 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-700">New Posts</h3>
                    <div class="text-3xl font-bold text-green-500">50</div>
                </div>
                <div class="mt-2 text-sm text-gray-500">Compared to last week</div>
            </div>

            <!-- Stats Card 3 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-700">Total Earnings</h3>
                    <div class="text-3xl font-bold text-yellow-500">$10,500</div>
                </div>
                <div class="mt-2 text-sm text-gray-500">In the last 30 days</div>
            </div>

            <!-- Stats Card 4 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold text-gray-700">Active Sessions</h3>
                    <div class="text-3xl font-bold text-purple-500">15</div>
                </div>
                <div class="mt-2 text-sm text-gray-500">Right now</div>
            </div>

        </div>

        <!-- Recent Activity Section -->
        <div class="mt-6 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700">Recent Activity</h2>
            <ul class="mt-4 space-y-4">
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">User <strong>John Doe</strong> added a new post.</span>
                    <span class="text-sm text-gray-500">2 hours ago</span>
                </li>
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">Admin <strong>Jane Smith</strong> updated site settings.</span>
                    <span class="text-sm text-gray-500">4 hours ago</span>
                </li>
                <li class="flex items-center justify-between">
                    <span class="text-gray-600">User <strong>Alex Johnson</strong> commented on a post.</span>
                    <span class="text-sm text-gray-500">8 hours ago</span>
                </li>
            </ul>
        </div>
@endsection

            
