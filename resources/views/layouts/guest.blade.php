@props(['role' => 'developer'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DevShop</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased bg-slate-50">
    <div x-data="{ isRecruiter: {{ $role === 'recruiter' ? 'true' : 'false' }} }"
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 transition-colors duration-300 bg-gray-50"
        :class="isRecruiter ? 'bg-emerald-100' : 'bg-blue-100'">
        <div>
            <a href="/">
                <div class="flex items-center">
                    <div class="w-10 h-10 rounded flex items-center justify-center text-white font-bold"
                        :class="isRecruiter ? 'bg-emerald-600' : 'bg-blue-600'">
                        DS
                    </div>
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
