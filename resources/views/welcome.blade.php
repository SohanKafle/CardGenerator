<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Registration</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans flex justify-center items-center min-h-screen px-4 relative">

    <!-- Search Membership Button in Top Right -->
    <div class="absolute top-6 right-6">
        <a href="{{route('search')}}" class="inline-block py-2 px-4 bg-green-600 text-white text-sm font-medium rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
            Search Membership
        </a>
    </div>

    
    <div class="bg-white p-8 rounded-2xl shadow-xl max-w-xl w-full">
        <!-- Logo and Company Name (Stacked Vertically) -->
        <div class="flex flex-col justify-center items-center mb-6 space-y-4">
            <img src="{{asset('images/logooo.jpg')}}" alt="Company Logo" class="w-24 h-24 rounded-full object-cover">
            <h1 class="text-3xl font-extrabold text-gray-800">D-Sir Cafe</h1>
        </div>

        <h2 class="text-2xl font-semibold text-gray-700 text-center mb-8">Register for Membership</h2>

        <!-- Form -->
        <form action="{{route('member.store')}}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block text-gray-600 font-medium mb-2">Full Name</label>
                <input type="text" id="name" name="name" class="mt-2 p-4 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Enter your Full Name" required>
            </div>

            <!-- Phone Input -->
            <div class="mb-6">
                <label for="phone" class="block text-gray-600 font-medium mb-2">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="mt-2 p-4 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200" placeholder="Enter your Phone Number" required>
            </div>

            <!-- Submit Button -->
            <div class="mb-6">
                <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Register Now
                </button>
            </div>
        </form>
    </div>

</body>
</html>
