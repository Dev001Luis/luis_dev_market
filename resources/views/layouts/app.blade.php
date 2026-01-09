<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('theme') === 'dark', sidebarOpen: true }" :class="{ 'dark': darkMode }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevShop - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            darkMode: 'class'
        }
    </script>
</head>

<body class="bg-white dark:bg-slate-900 text-slate-900 dark:text-slate-100 transition-colors duration-200">

    <nav
        class="h-16 border-b dark:border-slate-700 flex items-center justify-between px-6 bg-white dark:bg-slate-800 sticky top-0 z-50">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-blue-600 rounded flex items-center justify-center text-white font-bold">DS</div>
        </div>

        <div class="text-2xl font-black tracking-widest uppercase">DevShop</div>

        <div class="flex items-center gap-4">
            <button @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light')"
                class="p-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-700">
                <span x-show="!darkMode">🌙</span>
                <span x-show="darkMode">☀️</span>
            </button>

            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" class="p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"></path>
                    </svg>
                </button>
                <div x-show="open" @click.outside="open = false"
                    class="absolute right-0 mt-2 w-48 bg-white dark:bg-slate-800 border dark:border-slate-700 rounded-md shadow-lg py-1">
                    <a href="#" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-700">Settings</a>
                    <a href="/"
                        class="block px-4 py-2 text-red-600 hover:bg-slate-100 dark:hover:bg-slate-700">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div
        class="text-center py-2 bg-slate-50 dark:bg-slate-950 text-xs font-mono text-slate-500 uppercase tracking-widest border-b dark:border-slate-800">
        "We deal in clean code"
    </div>

    <div class="flex h-[calc(100vh-88px)] overflow-hidden">

        <aside
            class="transition-all duration-300 border-r dark:border-slate-700 bg-slate-50 dark:bg-slate-800 relative flex flex-col"
            :class="sidebarOpen ? 'w-1/3' : 'w-12'">
            <button @click="sidebarOpen = !sidebarOpen"
                class="absolute -right-3 top-4 bg-white dark:bg-slate-700 border dark:border-slate-600 rounded-full p-1 shadow-md z-10">
                <span x-text="sidebarOpen ? '←' : '→'"></span>
            </button>

            <div x-show="sidebarOpen" class="p-6 h-full overflow-y-auto">
                @yield('left_panel')
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-6 bg-white dark:bg-slate-900">
            @yield('right_panel')
        </main>
    </div>

</body>
<div class=" flex flex-col items-center justify-center relative px-4  ">
    <footer class="mt-16 text-slate-400 text-sm align-middle">
        &copy; 2026 DevShop Platform.
    </footer>
</div>

</html>
