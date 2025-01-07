@extends('layouts.app')
@section('content')

    <!-- Cards Section -->
    <div class="relative z-[10] grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-[10rem] px-6">
        <!-- Total Members Card -->
        <div class="bg-white p-6 text-left hover:shadow-2xl flex flex-row items-center justify-between w-full h-20 rounded-lg transform sm:-translate-y-8 lg:-translate-y-12 shadow-lg z-[5]">
            <div>
                <h2 class="text-gray-700 font-medium">Total Members</h2>
                <p class="text-gray-700 font-medium">1</p>
            </div>
            <div class="bg-yellow-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                <i class="ri-group-line text-2xl"></i>

            </div>
        </div>
        <!-- Total Visitors Card -->
        <div class="bg-white p-6 rounded-lg text-left hover:shadow-2xl transition-shadow duration-300 flex flex-row items-center justify-between w-full h-20 transform sm:-translate-y-8 lg:-translate-y-12 shadow-lg">
            <div>
                <h2 class="text-gray-700 font-medium mb-2">Total Visitors</h2>
                <p class="text-gray-700 font-medium">1</p>
            </div>
            <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full">
                <i class="ri-earth-fill text-2xl"></i>
            </div>
        </div>

    </div>
@endsection