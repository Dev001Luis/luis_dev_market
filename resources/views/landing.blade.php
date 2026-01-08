<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevShop - Clean Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-900 font-sans">

    <div class="min-h-screen flex flex-col items-center justify-center relative px-4">
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-600 via-purple-500 to-green-400"></div>

        <header class="text-center mb-12">
            <h1 class="text-6xl font-black tracking-tighter mb-2">
                Dev<span class="text-blue-600">Shop</span>
            </h1>
            <p class="text-xl text-slate-500 italic">"We deal in clean code."</p>
        </header>

        <main class="max-w-5xl w-full grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                <h2 class="text-2xl font-bold mb-4 text-blue-700">I am a Developer</h2>
                <p class="text-slate-600 mb-8">Build your profile, manage your skills, and showcase your clean code to
                    the world.</p>

                <div class="space-y-4">
                    <a href=""
                        class="block w-full py-3 text-center bg-blue-600 text-white rounded-lg font-bold hover:bg-blue-700">
                        Login / Register
                    </a>
                    <form action="{{ route('guest.access') }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="developer">
                        <button type="submit"
                            class="w-full py-3 border border-slate-300 rounded-lg font-semibold text-slate-700 hover:bg-slate-50">
                            Continue as Guest
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 hover:shadow-md transition-shadow">
                <h2 class="text-2xl font-bold mb-4 text-green-700">I am a Recruiter</h2>
                <p class="text-slate-600 mb-8">Search for specific competencies and find the "Unicorn" developer for
                    your next big project.</p>

                <div class="space-y-4">
                    <a href=""
                        class="block w-full py-3 text-center bg-green-600 text-white rounded-lg font-bold hover:bg-green-700">
                        Login / Register
                    </a>
                    <form action="{{ route('guest.access') }}" method="POST">
                        @csrf
                        <input type="hidden" name="role" value="recruiter">
                        <button type="submit"
                            class="w-full py-3 border border-slate-300 rounded-lg font-semibold text-slate-700 hover:bg-slate-50">
                            "Ok, Keep your secrets.."
                            (Continue as Guest)
                        </button>
                    </form>
                </div>
            </div>

        </main>

        <footer class="mt-16 text-slate-400 text-sm">
            &copy; 2026 DevShop Platform. Powered by Laravel.
        </footer>
    </div>

</body>

</html>
