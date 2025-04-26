@extends('layout')

@section('styles')
    <title>Search Product</title>
@endsection()

@section('content')
    <div
        class="flex flex-col md:flex-row h-full w-full md:w-11/12 mx-auto bg-white md:rounded-lg shadow-sm md:my-16 overflow-hidden">
        <!-- Sidebar Filter -->
        <aside class="w-full md:w-1/4 bg-gray-50 border-r border-gray-200 p-4">
            <h2 class="text-lg font-semibold mb-4">Filters</h2>

            <!-- Category Filter (Material) -->
            <div class="mb-6">
                <h3 class="text-md font-bold mb-2">Material Category</h3>
                <div class="flex flex-col space-y-2">
                    @foreach ($categories as $category)
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-pinkDark" value="{{ $category->id }}"
                                data-filter="category">
                            <span class="ml-2 text-sm text-gray-700">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Category Filter (Origin) -->
            <div class="mb-6">
                <h3 class="text-md font-bold mb-2">Origin</h3>
                <div class="flex flex-col space-y-2">
                    @foreach ($origins as $origin)
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox text-pinkDark" value="{{ $origin->id }}"
                                data-filter="origin">
                            <span class="ml-2 text-sm text-gray-700">{{ $origin->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Price Range Filter -->
            <div class="mb-6">
                <h3 class="text-md font-bold mb-2">Price Range</h3>
                <input type="range" id="priceRange" name="priceRange" min="{{ $minPrice }}" max="{{ $maxPrice }}"
                    value="{{ $maxPrice }}"
                    class="w-full h-2 bg-pink-300 rounded-full appearance-none focus:outline-none">
                <div class="flex justify-between text-sm text-gray-700">
                    <span>IDR {{ number_format($minPrice, 0, ',', '.') }}</span>
                    <span id="priceLabel">IDR {{ number_format($maxPrice, 0, ',', '.') }}</span>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="w-full md:w-3/4 p-4 overflow-y-auto">
            <!-- Search Bar -->
            <div class="mb-4">
                <input type="text" name="search" id="search" placeholder="Search products..."
                    class="w-full rounded-lg border-gray-300 focus:border-pinkDark focus:ring focus:ring-pinkDark focus:ring-opacity-50 px-4 py-2">
            </div>

            <!-- Result Count -->
            <div class="text-sm font-semibold text-gray-700 mb-2">
                0 products found
            </div>

            <hr class="border-gray-300 mb-4">

            <!-- Products List -->
            <div class="space-y-6" id="products-list">
                <!-- Products will be dynamically loaded here by AJAX -->
            </div>
        </main>
    </div>
@endsection()

@section('script')
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            let allProducts = [];

            // Fetch products from server
            function fetchProducts() {
                const searchKeyword = $('#search').val().toLowerCase();
                const selectedCategories = $('input[data-filter="category"]:checked').map(function() {
                    return this.value;
                }).get();

                const selectedOrigins = $('input[data-filter="origin"]:checked').map(function() {
                    return this.value;
                }).get();

                const selectedMaxPrice = parseInt($('#priceRange').val());

                $.ajax({
                    url: "{{ route('products.get') }}",
                    method: 'GET',
                    data: {
                        search: searchKeyword,
                        categories: selectedCategories,
                        origins: selectedOrigins,
                        max_price: selectedMaxPrice
                    },
                    success: function(data) {
                        allProducts = data;
                        renderProducts(allProducts);
                        updateResultCount(allProducts.length);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            }

            // Render products
            function renderProducts(products) {
                let html = '';

                if (products.length === 0) {
                    html = `<div class="text-center text-gray-500">No products found.</div>`;
                }

                products.forEach(product => {
                    let firstPrice = JSON.parse(product.price)[0].price;

                    html += `
                        <div class="flex flex-col md:flex-row bg-white rounded-lg shadow p-4 gap-6 border">
                            <div class="w-full md:w-1/3 h-48 overflow-hidden flex items-center justify-center">
                                <img src="${product.image}" alt="${product.name}"
                                    class="object-cover h-full w-full rounded-md">
                            </div>
                            <div class="w-full md:w-2/3 flex flex-col justify-between">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900 mb-2">${product.name}</h2>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        ${product.categories.map(cat => `<span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">${cat.name}</span>`).join('')}
                                    </div>
                                    <div class="text-sm text-gray-600 mb-2"><strong>Origin: </strong>${product.origin}</div>
                                    <p class="text-gray-600 text-sm leading-relaxed">
                                        Deskripsi produk belum tersedia.
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <p class="text-md font-semibold text-gray-900">
                                        From IDR ${firstPrice.toLocaleString('id-ID')} / meter
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                });

                $('#products-list').html(html);
            }

            // Update result count
            function updateResultCount(count) {
                $('.text-sm.font-semibold.text-gray-700.mb-2').text(`${count} products found`);
            }

            // Trigger fetch products on filter change
            $('input[type="checkbox"], #priceRange').on('input change', function() {
                fetchProducts();
            });

            // Trigger fetch products on search
            $('#search').on('input', function() {
                fetchProducts();
            });

            // Initial fetch
            fetchProducts();

            // Update price range label dynamically
            $('#priceRange').on('input', function(e) {
                $('#priceLabel').text('IDR ' + parseInt(e.target.value).toLocaleString('id-ID'));
            });
        });
    </script>
@endsection
