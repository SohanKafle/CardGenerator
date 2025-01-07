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
        <div class="flex justify-center items-center mb-6 space-x-4">

            <!-- Search Bar -->
            <div class="flex items-center space-x-2 border border-gray-300 rounded-lg p-1">
                <!-- Search Input Field -->
                <input type="text" id="searchInput" placeholder="Search Membership..." class="p-2 w-64 border-none rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                
                <!-- Search Button -->
                <a href="/search-membership" class="bg-blue-600 text-white py-2 px-4 rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 inline-block">
                    Search
                </a>
            </div>
        </div>

        <!-- Back Button -->
        <div class="flex justify-start mb-6">
            <a href="/" class="text-blue-600 hover:text-blue-800 focus:outline-none flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
        </div>

        <!-- Container for the cards -->
        <div class="flex flex-wrap justify-center gap-8">

            <!-- Card 1 with Background Image -->
            <div class="max-w-sm w-full bg-cover bg-center p-12 rounded-lg shadow-lg" style="background-image: url('{{asset('images/card.jpg')}}');">

                <div class="text-white">
                    <div class="flex justify-between mt-10 mb-4">
                        <span class="font-light">001</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Name:</span>
                        <span class="font-light">asf</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="font-medium">Phone Number:</span>
                        <span class="font-light">9876544</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
