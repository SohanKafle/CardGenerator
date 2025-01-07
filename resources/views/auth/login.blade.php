<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen relative">

    <!-- Back Button -->
    <a href="/" class="absolute top-6 left-6 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition duration-300 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H5"></path>
            <path d="M12 5l-7 7 7 7"></path>
        </svg>
        Back
    </a>

    <!-- Login Form Container -->
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md space-y-8 border border-gray-200">

        <!-- Header -->
        <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Admin Login</h2>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-600 mb-2 text-sm font-medium">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                    placeholder="Enter your email"
                    class="w-full p-4 rounded-lg bg-gray-50 text-gray-700 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-sm text-lg">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-600 mb-2 text-sm font-medium">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    placeholder="Enter your password"
                    class="w-full p-4 rounded-lg bg-gray-50 text-gray-700 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 shadow-sm text-lg">
            </div>

            <!-- Forgot Password -->
            <div class="flex justify-end mt-2">
                <a href="#" class="text-blue-500 text-sm font-medium hover:underline">Forgot Password?</a>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-4 bg-blue-600 text-white rounded-lg font-semibold hover:bg-blue-700 transition duration-200 focus:ring-2 focus:ring-blue-500 text-lg">
                Login
            </button>

        </form>

    </div>

</body>

</html>
