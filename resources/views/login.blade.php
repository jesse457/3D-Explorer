<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - 3D World Explorer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .login-bg {
            background: linear-gradient(-45deg, #111827, #1f2937, #374151, #4b5563);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>

<body class="login-bg">
    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <div class="w-full max-w-md">
            <div class="bg-gray-900/50 backdrop-blur-xl border border-gray-700 rounded-2xl shadow-2xl p-8 sm:p-10">
                <div class="text-center mb-8">
                    <a href="{{ url('/') }}" class="text-white text-3xl font-bold">
                        <span class="text-blue-400">3D</span>Explorer
                    </a>
                    <h1 class="text-2xl font-bold text-white mt-4">Welcome Back</h1>
                    <p class="text-gray-400">Sign in to continue your adventure.</p>
                </div>

                <!-- Show validation errors -->
                @if ($errors->any())
                    <div class="mb-4 bg-red-500/10 border border-red-600 text-red-300 text-sm rounded-lg p-4">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login.save') }}" method="POST">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="email" class="text-sm font-medium text-gray-300">Email address</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email"
                                    value="{{ old('email') }}" required
                                    class="w-full bg-gray-800 border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="text-sm font-medium text-gray-300">Password</label>
                                <a href="#" class="text-sm text-blue-500 hover:underline">Forgot password?</a>
                            </div>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="current-password" required
                                    class="w-full bg-gray-800 border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500 transition">
                            </div>
                        </div>

                        <div>
                            <button type="submit"
                                class="w-full flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                                Log in
                            </button>
                        </div>
                    </div>
                </form>

                <p class="mt-8 text-center text-sm text-gray-400">
                    Not a member?
                    <a href="{{ route('register') }}" class="font-medium text-blue-500 hover:underline">
                        Register now
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>

</html>
