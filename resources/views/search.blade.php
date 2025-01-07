<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membership Information</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .hidden-member {
            display: none;
        }

        /* Add class to show the member card */
        .show-member {
            display: flex;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    <div class="max-w-screen-xl mx-auto px-4 py-6">

        <!-- Back Button and Search Bar -->
        <div class="flex justify-between items-center mb-12">
            <!-- Back Button -->
            <a href="/" class="text-blue-600 hover:text-blue-800 focus:outline-none flex items-center mr-4 md:mr-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="w-6 h-6 inline-block mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back
            </a>
        
            <!-- Search Input Field -->
            <div class="flex justify-center items-center space-x-0 border border-gray-300 rounded-lg mx-auto w-full max-w-3xl">
                <input type="text" id="searchInput" placeholder="Search with your number..."
                    class="p-3 w-full border-none rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
        
                <!-- Search Button -->
                <button type="button" id="searchButton"
                    class="bg-blue-600 text-white py-3 px-6 rounded-r-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200 inline-block">
                    Search
                </button>
            </div>
        </div>
        

        <!-- Error Message -->
        <div id="errorMessage" class="text-center text-red-500 hidden mb-4"></div>

        <!-- Member Card (will be shown dynamically) -->

        <div id="memberCard" class="flex flex-wrap justify-center gap-8 hidden-member">
            <div class="max-w-sm w-full h-64 bg-cover bg-center p-14 rounded-lg shadow-lg relative"
                style="background-image: url('{{ asset('images/card.jpg') }}'); background-size: cover; background-position: center;">
                <div class="absolute top-[2.1rem] right-[7rem] p-2 text-white font-bold" id="memberId"></div>
                <div class="text-white mt-8">
                    <div class="flex justify-between mb-2">
                        <span class="font-bold text-xl" id="memberName"></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="font-bold text-xl" id="memberPhone"></span>
                    </div>
                </div>
            </div>
        </div>


        <!-- Show Member Details if ID is provided -->
        @if (isset($member))
            <div class="flex flex-wrap justify-center gap-8">
                <div class="max-w-sm w-full h-64 bg-cover bg-center p-14 rounded-lg shadow-lg relative"
                    style="background-image: url('{{ asset('images/card.jpg') }}'); background-size: cover; background-position: center;">
                    <div class="absolute top-[2.1rem] right-[8rem] p-2 text-white font-bold">
                        {{ $member->member_id }}
                    </div>
                    <div class="text-white mt-8">
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-xl">{{ $member->name }}</span>
                        </div>
                        <div class="flex justify-between mb-2">
                            <span class="font-bold text-xl">{{ $member->phone }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

    <script>
        // AJAX Search Functionality
        $(document).ready(function() {
            $('#searchButton').on('click', function() {
                var phone = $('#searchInput').val(); // Get the phone number from input field

                if (phone) {
                    $.ajax({
                        url: '{{ route('search') }}', // Your route for searching
                        method: 'POST',
                        data: {
                            phone: phone,
                            _token: '{{ csrf_token() }}' // CSRF Token for security
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                // Hide error message and display member info
                                $('#errorMessage').addClass('hidden');
                                $('#memberCard').removeClass('hidden-member').addClass(
                                    'show-member');
                                $('#memberId').text(response.member.member_id);
                                $('#memberName').text(response.member.name);
                                $('#memberPhone').text(response.member.phone);
                            } else {
                                // Show error message if no member is found
                                $('#memberCard').addClass('hidden-member').removeClass(
                                    'show-member');
                                $('#errorMessage').removeClass('hidden').text(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#errorMessage').removeClass('hidden').text(
                                'An error occurred. Please try again.');
                        }
                    });
                } else {
                    // Show error message if no phone number is provided
                    $('#errorMessage').removeClass('hidden').text('Please enter a phone number.');
                }
            });
        });
    </script>

</body>

</html>
