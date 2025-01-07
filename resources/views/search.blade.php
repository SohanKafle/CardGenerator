<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Information</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans">

    <!-- Container for the whole page -->
    <div class="max-w-screen-xl mx-auto px-4 py-6">

        <!-- Back Button and Search Bar -->
        <div class="flex justify-between items-center mb-6">
            <!-- Back Button -->
            <a href="/" class="text-blue-600 hover:text-blue-800 focus:outline-none flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>

            <!-- Search Bar -->
            <div class="flex items-center space-x-0 border border-gray-300 rounded-lg p-1">
                <!-- Search Input Field -->
                <input type="text" id="searchInput" placeholder="Search Membership..." class="p-2 w-64 border-none rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                
                <!-- Search Button -->
                <a href="/search-membership" class="bg-blue-600 text-white py-2 px-4 rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 inline-block">
                    Search
                </a>
            </div>
        </div>

        <!-- Container for the cards -->
        <div class="flex flex-wrap justify-center gap-8">

            <!-- Card 1 -->
            <div class="max-w-sm w-full bg-white p-6 rounded-lg shadow-lg">
                <div class="text-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Membership Details</h2>
                </div>

                <div class="text-gray-600">
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Membership ID:</span>
                        <span class="font-light">001</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Name:</span>
                        <span class="font-light">Sohan Kafle</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Phone Number:</span>
                        <span class="font-light">9812211443</span>
                    </div>
                </div>
            </div>

            <!-- Card 2 (Example with another member) -->
            <div class="max-w-sm w-full bg-white p-6 rounded-lg shadow-lg">
                <div class="text-center mb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Membership Details</h2>
                </div>

                <div class="text-gray-600">
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Membership ID:</span>
                        <span class="font-light">002</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Name:</span>
                        <span class="font-light">Subash Adhikari</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Phone Number:</span>
                        <span class="font-light">9767644641</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
