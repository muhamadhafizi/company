<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyCompany - @yield('title', 'Dashboard')</title>
    <link rel="shortcut icon" href="{{ asset('tailadmin/build/favicon.ico') }}" type="image/x-icon">
    <link href="{{ asset('tailadmin/build/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Page Wrapper -->
    <div id="wrapper" class="min-h-screen flex flex-col">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md fixed h-full overflow-auto">
            <div class="p-6">
                <a href="/" class="text-2xl font-semibold text-gray-800">
                    MyCompany
                </a>
            </div>
            <nav class="mt-6">
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('dashboard.index') }}"
                            class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('companies.index') }}"
                            class="flex items-center px-6 py-3 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2V9a2 2 0 00-2-2h-2a2 2 0 00-2 2v10">
                                </path>
                            </svg>
                            Company
                        </a>
                    </li>
                    <!-- Add more menu items as needed -->
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="ml-64 flex-1">
            <!-- Topbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <div class="text-lg font-semibold text-gray-800">
                    @yield('page-title', 'Dashboard')
                </div>
                <div class="flex items-center">
                    <span class="text-gray-600 mr-4">{{ auth()->user()->name ?? 'Guest' }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-transparent text-blue-600 underline">Logout</button>
                    </form>
                    {{-- <a href="{{ route('logout') }}" class="text-gray-600 hover:text-gray-800">Logout</a> --}}
                </div>
            </header>

            <!-- Content -->
            <main>
                <div class="p-4 mx-auto max-w-(--breakpoint-2xl) md:p-6">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- TailAdmin JS -->
    <script defer src="{{ asset('tailadmin/build/bundle.js') }}"></script>
    <!-- Additional JS if needed -->
    @yield('scripts')
</body>

</html>
