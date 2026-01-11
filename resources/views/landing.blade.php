<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevShop - Clean Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 font-sans">
    <div x-data="{ isRecruiter: false }"
        class="min-h-screen flex flex-col items-center justify-center p-4 transition-colors duration-500"
        :class="isRecruiter ? 'bg-emerald-100' : 'bg-blue-100'">

        <header class="text-center mb-10">
            <h1 class="text-6xl font-black tracking-tighter mb-2">
                Dev<span :class="isRecruiter ? 'text-emerald-600' : 'text-blue-600'">Shop</span>
            </h1>
            <p class="text-xl text-slate-500 italic">"We deal in clean code."</p>
        </header>

        <div class="flex items-center justify-center gap-4 mb-8">
            <span class="font-bold text-sm" :class="!isRecruiter ? 'text-blue-600' : 'text-slate-400'">DEVELOPER</span>

            <button @click="isRecruiter = !isRecruiter"
                class="w-14 h-8 flex items-center bg-slate-300 rounded-full p-1 duration-300 ease-in-out"
                :class="{ 'bg-emerald-500': isRecruiter, 'bg-blue-500': !isRecruiter }">
                <div class="bg-white w-6 h-6 rounded-full shadow-md transform duration-300 ease-in-out"
                    :class="{ 'translate-x-6': isRecruiter }"></div>
            </button>

            <span class="font-bold text-sm"
                :class="isRecruiter ? 'text-emerald-600' : 'text-slate-400'">RECRUITER</span>
        </div>

        <main class="max-w-md w-full bg-white p-8 rounded-3xl shadow-xl border border-slate-200">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold mb-2">
                    Join as a <span x-text="isRecruiter ? 'Recruiter' : 'Developer'"></span>
                </h2>
                <p class="text-slate-500 text-sm">
                    <span x-show="!isRecruiter">Build your skill tree and showcase your code to top firms.</span>
                    <span x-show="isRecruiter">Find your "Unicorn" developer with specialized expertise.</span>
                </p>
            </div>

            <div class="space-y-4">
                <a :href="'/login?role=' + (isRecruiter ? 'recruiter' : 'developer')"
                    class="block w-full py-4 text-center text-white rounded-xl font-bold transition-colors shadow-lg"
                    :class="isRecruiter ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-blue-600 hover:bg-blue-700'">
                    Login
                </a>
                <a :href="'/register?role=' + (isRecruiter ? 'recruiter' : 'developer')"
                    class="block w-full py-4 text-center text-white rounded-xl font-bold transition-colors shadow-lg"
                    :class="isRecruiter ? 'bg-emerald-600 hover:bg-emerald-700' : 'bg-blue-600 hover:bg-blue-700'">
                    Register
                </a>

                <form action="{{ route('guest.access') }}" method="POST">
                    @csrf
                    <input type="hidden" name="role" :value="isRecruiter ? 'recruiter' : 'developer'">
                    <button type="submit"
                        class="w-full py-3 border-2 border-slate-100 rounded-xl font-semibold text-slate-600 hover:bg-slate-50 transition-all">
                        Continue as Guest
                    </button>
                </form>
            </div>
        </main>

        <footer class="mt-12 text-slate-400 text-xs uppercase tracking-widest">
            &copy; 2026 DevShop &bull; Pure Clean Code
        </footer>
    </div>
