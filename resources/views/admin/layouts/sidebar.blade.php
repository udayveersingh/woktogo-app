 <!-- Sidebar -->
 <div class="bg-gray-800 text-white w-64 space-y-6 py-7 px-2">
    <!-- Logo -->
    <a href="#" class="text-white flex items-center space-x-2 px-4">
        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 4h16v16H4z"></path>
        </svg>
        <span class="text-2xl font-extrabold">Admin Panel</span>
    </a>
    
    <!-- Navigation -->
    <nav>
        <a href="{{ route('dashboard') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Dashboard
        </a>
        <a href="{{ route('show-user') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Users
        </a>
        <a href="{{ route('admin.deals.index') }}" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Deals 
        </a>
        <a href="#" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-700 hover:text-white">
            Settings
        </a>
    </nav>
</div>