@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
        <h1 class="text-3xl font-bold">Products</h1>
        <div class="flex items-center gap-4 w-full md:w-auto">
            <label class="input input-bordered flex items-center gap-2 relative">
                <input type="text" id="search-input" class="grow" placeholder="Search products..."
                    value="{{ request('search') }}" />
                <i data-lucide="search" class="w-4 h-4 opacity-70" id="search-icon"></i>
                <span class="loading loading-spinner loading-sm absolute right-3 hidden" id="search-loading"></span>
            </label>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary whitespace-nowrap">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Create Product
            </a>
        </div>
    </div>

    @if (session('success'))
        <div role="alert" class="alert alert-success mb-6">
            <i data-lucide="check-circle" class="w-6 h-6"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-xl">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Date Available</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="products-table-body">
                @include('admin.products.partials.table-rows', ['products' => $products])
            </tbody>
        </table>
    </div>


    <div class="mt-4" id="pagination-container">
        @include('admin.products.partials.pagination', ['products' => $products])
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            let searchTimeout;
            const searchInput = $('#search-input');
            const searchIcon = $('#search-icon');
            const searchLoading = $('#search-loading');
            const tableBody = $('#products-table-body');
            const paginationContainer = $('#pagination-container');

            // Function to perform search
            function performSearch(query) {
                // Show loading indicator
                searchIcon.addClass('hidden');
                searchLoading.removeClass('hidden');

                $.ajax({
                    url: '{{ route('admin.products.search') }}',
                    type: 'GET',
                    data: {
                        search: query
                    },
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        // Update table body
                        tableBody.html(response.html);

                        // Update pagination
                        paginationContainer.html(response.pagination);

                        // Reinitialize Lucide icons for new content
                        if (typeof lucide !== 'undefined') {
                            lucide.createIcons();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Search error:', error);
                        tableBody.html(
                            '<tr><td colspan="5" class="text-center py-8 text-error">Error loading results. Please try again.</td></tr>'
                            );
                    },
                    complete: function() {
                        // Hide loading indicator
                        searchLoading.addClass('hidden');
                        searchIcon.removeClass('hidden');
                    }
                });
            }

            // Debounced search on input
            searchInput.on('input', function() {
                const query = $(this).val();

                // Clear existing timeout
                clearTimeout(searchTimeout);

                // Set new timeout for debouncing (300ms delay)
                searchTimeout = setTimeout(function() {
                    performSearch(query);
                }, 300);
            });

            // Handle pagination clicks
            $(document).on('click', '#pagination-container a', function(e) {
                e.preventDefault();
                const url = $(this).attr('href');

                if (url) {
                    // Show loading
                    searchIcon.addClass('hidden');
                    searchLoading.removeClass('hidden');

                    $.ajax({
                        url: url,
                        type: 'GET',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        success: function(response) {
                            tableBody.html(response.html);
                            paginationContainer.html(response.pagination);

                            // Scroll to top of table
                            $('html, body').animate({
                                scrollTop: tableBody.offset().top - 100
                            }, 300);

                            // Reinitialize Lucide icons
                            if (typeof lucide !== 'undefined') {
                                lucide.createIcons();
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Pagination error:', error);
                        },
                        complete: function() {
                            searchLoading.addClass('hidden');
                            searchIcon.removeClass('hidden');
                        }
                    });
                }
            });
        });
    </script>
@endpush
