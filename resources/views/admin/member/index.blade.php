@extends('layouts.app')
@section('content')


{{-- Flash Message --}}
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

<div class="max-w-8xl mx-auto p-4 bg-white shadow-lg mt-[7rem] rounded-lg relative z-10">
    

    

    <div class="flex flex-col sm:flex-row justify-between mb-4 gap-4">
        <div class="flex items-center space-x-2">
            <label for="entries" class="mr-2">Show entries:</label>
            <select id="entries" class="border border-gray-300 px-5 py-1 w-full sm:w-auto pr-10" onchange="updateEntries()">
                <option value="5" {{ request('entries') == 5 ? 'selected' : '' }}>5</option>
                <option value="15" {{ request('entries') == 15 ? 'selected' : '' }}>15</option>
                <option value="25" {{ request('entries') == 25 ? 'selected' : '' }}>25</option>
            </select>
        </div>

        <div class="flex items-center space-x-2 w-full sm:w-auto">
            <span class="text-gray-700">Search:</span>
            <input type="text" id="search" placeholder="Search..."
                class="border border-gray-300 px-4 py-2 w-full sm:w-96" />
        </div>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto">
        <table id="categoryTable" class="min-w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">S.N</th>
                    <th class="border border-gray-300 px-4 py-2">Member Id</th>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Phone</th>
                    <th class="border border-gray-300 px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <tr class="border border-gray-300">
                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>

                    <td class="border border-gray-300 px-4 py-2">{{ $category->member_id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $category->phone }}</td>
                    </td>
                    <td class="px-2 py-2 mt-2 flex justify-center space-x-4">
                        <!-- Edit Icon -->
                        <a href="{{ route('admin.member.edit', ['id' => $member->id]) }}" class="bg-blue-500 hover:bg-blue-700 p-2 w-10 h-10 rounded-full flex items-center justify-center">
                            <i class="ri-edit-box-line text-white"></i>
                        </a>
                        <!-- Delete Icon -->
                        <form action="{{ route('admin.member.delete', ['id' => $member->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                            @csrf
                            @method('delete')
                            <button class="bg-red-500 hover:bg-red-700 p-2 w-10 h-10 rounded-full flex items-center justify-center">
                                <i class="ri-delete-bin-line text-white"></i>
                            </button>
                        </form>

                        <!-- Settings Icon -->
                        <form action="#" method="get">
                            @csrf

                            <button class="bg-green-500 hover:bg-green-700 p-2 w-10 h-10 rounded-full flex items-center justify-center">
                                <i class="ri-settings-5-line text-white"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination and Show Entries Section at the Bottom -->
    <div class="flex justify-between items-center mt-4">
        <div class="flex items-center space-x-2">
            <span class="ml-4 text-gray-700">
                Showing {{ $members->firstItem() }} to {{ $members->lastItem() }} of {{ $members->total() }}
                entries
            </span>
        </div>

        <div class="flex items-center space-x-2">
            {{ $members->links() }}
        </div>
    </div>


</div>

<script>
    document.querySelectorAll('.toggle-switch').forEach(toggle => {
        const dot = toggle.parentNode.querySelector('.dot');

        // Apply the correct initial state
        if (toggle.checked) {
            dot.style.transform = 'translateX(100%)';
            dot.style.backgroundColor = 'green';
        } else {
            dot.style.transform = 'translateX(0)';
            dot.style.backgroundColor = 'white';
        }

        toggle.addEventListener('change', function() {
            const categoryId = this.getAttribute('data-id');
            const newState = this.checked ? 1 : 0;

            // Toggle visual effect
            if (this.checked) {
                dot.style.transform = 'translateX(100%)';
                dot.style.backgroundColor = 'green';
            } else {
                dot.style.transform = 'translateX(0)';
                dot.style.backgroundColor = 'white';
            }

            // Send AJAX request to update the product status in the database
            fetch(`/admin/category/update-toggle/${categoryId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // CSRF token for security
                    },
                    body: JSON.stringify({
                        state: newState,
                        type: 'status',
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        // If the update fails, reset the toggle state
                        this.checked = !this.checked;
                        dot.style.transform = this.checked ? 'translateX(100%)' : 'translateX(0)';
                        dot.style.backgroundColor = this.checked ? 'green' : 'white';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Reset the toggle state in case of an error
                    this.checked = !this.checked;
                    dot.style.transform = this.checked ? 'translateX(100%)' : 'translateX(0)';
                    dot.style.backgroundColor = this.checked ? 'green' : 'white';
                });
        });
    });
</script>

<script>
    // Function to generate slug from category name
    function generateSlug() {
        let input1 = document.getElementById('category').value;
        let slug = input1.trim().replace(/\s+/g, '-').toLowerCase();
        document.getElementById('slug').value = slug;
    }

    // Open the modal
    document.getElementById('openModalButton').addEventListener('click', function() {
        document.getElementById('categoryModal').classList.remove('modal-hidden');
        document.getElementById('categoryModal').classList.add('modal-visible'); // Show modal
        document.body.classList.add('overflow-hidden'); // Disable scrolling when modal is open
    });

    // Close the modal
    document.getElementById('closeModalButton').addEventListener('click', function() {
        document.getElementById('categoryModal').classList.remove('modal-visible');
        document.getElementById('categoryModal').classList.add('modal-hidden'); // Hide modal
        document.body.classList.remove('overflow-hidden'); // Re-enable scrolling
    });


    //search

     
    document.getElementById('search').addEventListener('input', function() {
    const searchQuery = this.value.trim().toLowerCase(); // Trim any extra spaces and convert to lowercase

    // Update the URL with the encoded search query
    history.pushState(null, null, `?search=${encodeURIComponent(searchQuery)}`);

    // Filter the table based on category name
    filterTableByCategoryname(searchQuery);
});

function filterTableByCategoryname(query) {
    const rows = document.querySelectorAll('#categoryTable tbody tr'); 
    rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        const categoryCell = cells[1];  // Assuming the category is in the first column (index 0)

        if (categoryCell) {
            const categoryText = categoryCell.textContent.trim().toLowerCase();  // Get the category name, trimmed and lowercase
            if (categoryText.includes(query)) {  // Use 'includes' to match anywhere in the category name
                row.style.display = '';  // Show the row
            } else {
                row.style.display = 'none';  // Hide the row
            }
        }
    });
}

window.addEventListener('popstate', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const searchQuery = urlParams.get('search') || ''; // Default to empty if no search query
    document.getElementById('search').value = searchQuery;  // Update the search input field
    filterTableByCategoryname(searchQuery); // Reapply the filter based on URL search query
});

</script>
@endsection