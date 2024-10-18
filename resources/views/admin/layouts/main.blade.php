<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Wrapper -->
    <div class="flex h-screen">
        
        @include('admin.layouts.sidebar')

        <div class="flex-1 flex flex-col">
            @include('admin.layouts.header')

            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>

            @include('admin.layouts.footer')

        </div>
        
      
    </div>

</body>
</html>
