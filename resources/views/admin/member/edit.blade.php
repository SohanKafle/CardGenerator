@extends('layouts.app')
@section('content')

  <!-- Flash Message -->
  @if(session('success'))
    <div id="flash-message" class="bg-green-500 text-white px-6 py-2 rounded-lg fixed top-4 right-4 shadow-lg z-50">
        {{ session('success') }}
    </div>
  @endif

  <script>
    if (document.getElementById('flash-message')) setTimeout(() => {
        const msg = document.getElementById('flash-message');
        msg.style.opacity = 0;
        msg.style.transition = "opacity 0.5s ease-out";
        setTimeout(() => msg.remove(), 500);
    }, 3000);
  </script>

  <!-- Container -->
  <div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-lg mt-[7rem] relative z-10">

    <!-- Form -->
    <form action="{{ route('admin.member.update', $member->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
      @csrf
      @method('PATCH')

      {{-- Error Message --}}
      @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-md">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- name  Input -->
      <div class="mb-6">
        <label for="name" class="block text-lg font-medium text-gray-700"> Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}" placeholder="Enter member name"
               class="mt-2 px-5 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none text-lg" >
      </div>

      <!-- Slug Input -->
      <div class="mb-6">
        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone', $member->phone) }}" placeholder=""
               class="mt-2 px-5 py-3 w-full border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none" >
      </div>


     

        <!-- Submit Button -->
        <button type="submit" class="w-full md:w-auto bg-gradient-to-r from-indigo-600 to-indigo-700 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 transform hover:scale-105">
          Update Member
        </button>
      </div>
    </form>
  </div>

  

@endsection

