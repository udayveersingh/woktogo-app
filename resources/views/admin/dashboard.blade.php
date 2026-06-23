@extends('admin.layouts.main')

@section('title', 'Users Management')

@section('content')
<!-- Dashboard Content -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <!-- Stats Card 1 -->
    <div class="bg-white rounded-xl shadow p-6 text-center">
        <h4 class="text-gray-500 font-medium">
            Total Users
        </h4>

        <div class="mt-3 text-4xl font-bold text-blue-500">
            {{ $totalUsers ?? 0 }}
        </div>
    </div>

    <!-- Stats Card 2 -->
    <div class="bg-white rounded-xl shadow p-6 text-center">
        <h4 class="text-gray-500 font-medium">
            Total Deals
        </h4>

        <div class="mt-3 text-4xl font-bold text-green-500">
            {{ $totalDeals ?? 0 }}
        </div>
    </div>

    <!-- Stats Card 3 -->
    <div class="bg-white rounded-xl shadow p-6 text-center">
        <h4 class="text-gray-500 font-medium">
            Total Claims
        </h4>

        <div class="mt-3 text-4xl font-bold text-yellow-500">
            {{ $totalClaims ?? 0 }}
        </div>
    </div>

    
    <div class="bg-white rounded-xl shadow p-6 text-center">
        <h4 class="text-gray-500 font-medium">
            Total Visits
        </h4>
        
        <div class="mt-3 text-4xl font-bold text-purple-500">
            {{ $totalVisits ?? 0 }}
        </div>
    </div>
    
    <div class="bg-white rounded-xl shadow p-6 text-center">
        <h4 class="text-gray-500 font-medium">
            Total QrScans
        </h4>
        
        <div class="mt-3 text-4xl font-bold text-purple-500">
            {{ $totalQrScans ?? 0 }}
        </div>
    </div>
    <!-- Stats Card 4 -->
    <div class="bg-white rounded-xl shadow p-6 text-center">
        <h4 class="text-gray-500 font-medium">
            Points Awarded
        </h4>

        <div class="mt-3 text-4xl font-bold text-purple-500">
            {{ $totalPointsAwarded ?? 0 }}
        </div>
    </div>

    <!-- Stats Card 3 -->
    <!-- <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">Points Awarded</h3>
        </div>
        <div class="text-3xl font-bold text-purple-500">{{!empty($totalPointsAwarded) ? $totalPointsAwarded:0 }}</div>

    </div> -->
    <!-- Stats Card 4 -->
    <!-- <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">Top Deals</h3>
        </div>
        <div class="text-3xl font-bold text-yellow-500">{{!empty($topDeals) ? $topDeals:0;}} </div> -->

    <!-- <div class="mt-2 text-sm text-gray-500">In the last 30 days</div>
    </div> -->

    <!-- Stats Card 1 -->
    <!-- <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <div class="text-3xl font-bold text-blue-500">245</div>
        </div>
        <div class="mt-2 text-sm text-gray-500">Compared to last month</div>
    </div> -->

    <!-- Stats Card 2 -->
    <!-- <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">New Posts</h3>
            <div class="text-3xl font-bold text-green-500">50</div>
        </div>
        <div class="mt-2 text-sm text-gray-500">Compared to last week</div>
    </div> -->

    <!-- Stats Card 3 -->
    <!-- <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">Total Earnings</h3>
            <div class="text-3xl font-bold text-yellow-500">$10,500</div>
        </div>
        <div class="mt-2 text-sm text-gray-500">In the last 30 days</div>
    </div> -->

    <!-- Stats Card 4 -->
    <!-- <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold text-gray-700">Active Sessions</h3>
            <div class="text-3xl font-bold text-purple-500">15</div>
        </div>
        <div class="mt-2 text-sm text-gray-500">Right now</div>
    </div> -->

</div>

<div class="mt-6 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">
        Top Deals
    </h2>
    <table class="min-w-full mt-6 bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-3 px-4 border-b text-center">#</th>
                <th class="py-3 px-4 border-b text-center">Deal Title</th>
                <th class="py-3 px-4 border-b text-center">Total Claims</th>
            </tr>
        </thead>
        <tbody>
            @forelse($topDeals as $key => $deal)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4 text-center">
                    {{ $key + 1 }}
                </td>

                <td class="py-3 px-4 text-center">
                    {{ $deal->title }}
                </td>

                <td class="py-3 px-4 text-center font-semibold text-green-600">
                    {{ $deal->total_claims }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="py-4 text-center">
                    No Deals Found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="mt-6 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">
        Recent Claims
    </h2>
    <table class="min-w-full mt-6 bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="py-3 px-4 border-b text-center">#</th>
                <th class="py-3 px-4 border-b text-center">User Name</th>
                <th class="py-3 px-4 border-b text-center">Deal</th>
                <th class="py-3 px-4 border-b text-center">Deal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentClaims as $key => $claim)
            <tr class="border-b hover:bg-gray-50">
                <td class="py-3 px-4 text-center">
                    {{ $key + 1 }}
                </td>

                <td class="py-3 px-4 text-center">
                    {{ $claim->name }}
                </td>

                <td class="py-3 px-4 text-center font-semibold text-green-600">
                    {{ $claim->title }}
                </td>
                <td class="py-3 px-4 text-center font-semibold text-green-600">
                    {{ $claim->created_at }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="py-4 text-center">
                    No Claim Found
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
<!-- Recent Activity Section -->
<!-- <div class="mt-6 bg-white shadow-md rounded-lg p-6">
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
</div> -->
@endsection