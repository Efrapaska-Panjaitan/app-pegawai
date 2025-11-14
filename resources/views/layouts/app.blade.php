<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'App Pegawai')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside id="sidebar" class="w-64 bg-gradient-to-b from-blue-600 to-blue-800 text-white flex flex-col transition-all duration-300">
            <div class="p-6 border-b border-blue-500">
                <h1 class="text-2xl font-bold">App Pegawai</h1>
            </div>
            <nav class="flex-1 p-4 overflow-y-auto">
                <a href="{{ route('employees.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 transition-all {{ request()->routeIs('employees.*') ? 'bg-white text-blue-600 shadow-lg' : 'hover:bg-blue-700' }}">
                    <i class="fas fa-users"></i>
                    <span class="font-medium">Employees</span>
                </a>
                
                <a href="{{ route('departments.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 transition-all {{ request()->routeIs('departments.*') ? 'bg-white text-blue-600 shadow-lg' : 'hover:bg-blue-700' }}">
                    <i class="fas fa-briefcase"></i>
                    <span class="font-medium">Department</span>
                </a>
                
                <a href="{{ route('positions.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 transition-all {{ request()->routeIs('positions.*') ? 'bg-white text-blue-600 shadow-lg' : 'hover:bg-blue-700' }}">
                    <i class="fas fa-award"></i>
                    <span class="font-medium">Position</span>
                </a>
                
                <a href="{{ route('attendances.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 transition-all {{ request()->routeIs('attendances.*') ? 'bg-white text-blue-600 shadow-lg' : 'hover:bg-blue-700' }}">
                    <i class="fas fa-calendar"></i>
                    <span class="font-medium">Attendance</span>
                </a>
                
                <a href="{{ route('salaries.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 transition-all {{ request()->routeIs('salaries.*') ? 'bg-white text-blue-600 shadow-lg' : 'hover:bg-blue-700' }}">
                    <i class="fas fa-dollar-sign"></i>
                    <span class="font-medium">Salaries</span>
                </a>
                {{--
                <a href="{{ route('reports.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 transition-all {{ request()->routeIs('reports.*') ? 'bg-white text-blue-600 shadow-lg' : 'hover:bg-blue-700' }}">
                    <i class="fas fa-file-alt"></i>
                    <span class="font-medium">Report</span>
                </a>
                
                <a href="{{ route('settings.index') }}" class="w-full flex items-center space-x-3 px-4 py-3 rounded-lg mb-2 transition-all {{ request()->routeIs('settings.*') ? 'bg-white text-blue-600 shadow-lg' : 'hover:bg-blue-700' }}">
                    <i class="fas fa-cog"></i>
                    <span class="font-medium">Settings</span>
                </a>
                --}}
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 flex items-center justify-between">
                <button id="toggleSidebar" class="p-2 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <div class="text-right">
                        <p class="text-sm font-medium text-gray-700">Admin User</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                        A
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-0');
        });
    </script>
</body>
</html>