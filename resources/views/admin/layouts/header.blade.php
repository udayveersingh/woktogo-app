  <!-- Top Bar -->
  <header class="bg-white shadow-md py-4 px-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-700">Users Management</h1>
        <div class="flex items-center space-x-4">
            {{-- <input type="text" class="px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-indigo-100" placeholder="Search Users...">
            <button class="bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition duration-300">
                Search
            </button>
            <button class="bg-green-500 text-white px-3 py-2 rounded-md hover:bg-green-600 transition duration-300">
                Add User
            </button> --}}
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="bg-red-600 text-white font-semibold py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                    Logout
                </button>
            </form>
        </div>
    </div>
</header>