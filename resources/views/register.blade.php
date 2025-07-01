<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register - 3D World Explorer</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
    .register-bg {
      background: linear-gradient(45deg, #111827, #0c1c33, #1f2937, #111827);
      background-size: 400% 400%;
      animation: gradient 20s ease infinite;
    }
    @keyframes gradient {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }
  </style>
</head>
<body class="register-bg">
  <div class="flex flex-col items-center justify-center min-h-screen px-4 py-8">
    <div class="w-full max-w-md">
      <div class="bg-gray-900/50 backdrop-blur-xl border border-gray-700 rounded-2xl shadow-2xl p-8 sm:p-10">
        <div class="text-center mb-8">
          <a href="{{ url('/') }}" class="text-white text-3xl font-bold">
            <span class="text-blue-400">3D</span>Explorer
          </a>
          <h1 class="text-2xl font-bold text-white mt-4">Create Your Account</h1>
          <p class="text-gray-400">Join us to start your virtual exploration.</p>
        </div>

        <!-- Error block -->
        @if ($errors->any())
          <div class="mb-4 bg-red-500/10 border border-red-600 text-red-300 text-sm rounded-lg p-4">
            <ul class="list-disc list-inside">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Register form -->
        <form action="{{ route('register.save') }}" method="POST">
          @csrf
          <div class="space-y-5">
            <div>
              <label for="fullname" class="text-sm font-medium text-gray-300">Full Name</label>
              <div class="mt-2">
                <input id="fullname" name="name" type="text" autocomplete="name" value="{{ old('name') }}" required
                  class="w-full bg-gray-800 border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500 transition">
              </div>
            </div>

            <div>
              <label for="email" class="text-sm font-medium text-gray-300">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email') }}" required
                  class="w-full bg-gray-800 border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500 transition">
              </div>
            </div>

            <div>
              <label for="password" class="text-sm font-medium text-gray-300">Password</label>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="new-password" required
                  class="w-full bg-gray-800 border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500 transition">
              </div>
            </div>

            <div>
              <label for="confirm-password" class="text-sm font-medium text-gray-300">Confirm Password</label>
              <div class="mt-2">
                <input id="confirm-password" name="password_confirmation" type="password" autocomplete="new-password" required
                  class="w-full bg-gray-800 border-gray-600 text-white rounded-lg px-4 py-3 focus:ring-blue-500 focus:border-blue-500 transition">
              </div>
            </div>

            <div>
              <button type="submit"
                class="w-full flex justify-center bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                Create Account
              </button>
            </div>
          </div>
        </form>

        <p class="mt-8 text-center text-sm text-gray-400">
          Already a member?
          <a href="{{ route('login') }}" class="font-medium text-blue-500 hover:underline">
            Log in
          </a>
        </p>
      </div>
    </div>
  </div>
</body>
</html>
