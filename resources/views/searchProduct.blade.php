@extends('layout')

@section('styles')
    <title>Product Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-pI3dUK1uLxklqBhv/0FsyKcBJJx+hXDg7F9d6pxDKQ3N5jX8lqViIrFe4S49Jq5Arhc3lAW2kxI9fRQez/fh4g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Custom styles for range input */
        #priceRange::-webkit-slider-thumb {
            background-color: #d97706;
            /* orange-700 */
        }

        #priceRange::-moz-range-thumb {
            background-color: #d97706;
            /* orange-700 */
        }

        #priceRange::-ms-thumb {
            background-color: #d97706;
            /* orange-700 */
        }
    </style>
@endsection()

@section('content')
    <div class="flex flex-col md:flex-row bg-white h-screen w-full overflow-hidden">
        <button id="floating-filter-btn"
            class="md:hidden fixed bottom-10 right-10 bg-gray-50 text-dark rounded-full p-4 shadow-xl z-30">
            <!-- Default icon: Filter -->
            <svg id="filter-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 4.5h17.25M3 9.75h13.5m-13.5 5.25h17.25m-13.5 5.25h13.5" />
            </svg>
        </button>


        <!-- Sidebar Filter (Toggleable on Mobile) -->
        <aside id="sidebar"
            class="fixed md:relative md:top-0 left-0 w-64 md:w-1/4 bg-gray-50 border-r border-gray-200 p-6 h-full transition-transform transform md:translate-x-0 -translate-x-full z-40"
            id="sidebar">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Filters</h2>

            <!-- Semantic Toggle -->
            <div class="mb-2">
                <div class="flex justify-between items-center">
                    <h3 class="text-md font-bold mb-2 text-gray-700">Material Category</h3>
                    <label for="semantic-toggle" class="flex items-center gap-2">
                        <input type="checkbox" id="semantic-toggle" class="hidden" />
                        <div class="relative w-10 h-6">
                            <div class="absolute w-10 h-6 bg-gray-300 rounded-full transition-all" id="toggle-background">
                            </div>
                            <div class="absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-all transform"
                                id="toggle-ball"></div>
                        </div>
                    </label>
                </div>
            </div>
            <!-- Category Filter (Material) -->
            <div class="mb-6">
                <h3 class="text-md font-bold mb-2 text-gray-700">Material Category</h3>
                <div class="flex flex-col space-y-2">
                    @foreach ($categories as $category)
                        <label class="inline-flex items-center text-gray-600 hover:text-pink-600">
                            <input type="checkbox" class="form-checkbox text-pink-600" value="{{ $category->id }}"
                                data-filter="category" @if (request()->category === $category->name) checked @endif>
                            <span class="ml-2 text-sm">{{ $category->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Category Filter (Origin) -->
            <div class="mb-6">
                <h3 class="text-md font-bold mb-2 text-gray-700">Origin</h3>
                <div class="flex flex-col space-y-2">
                    @foreach ($origins as $origin)
                        <label class="inline-flex items-center text-gray-600 hover:text-pink-600">
                            <input type="checkbox" class="form-checkbox text-pink-600" value="{{ $origin->id }}"
                                data-filter="origin">
                            <span class="ml-2 text-sm">{{ $origin->name }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <!-- Price Range Filter -->
            <div class="mb-6">
                <h3 class="text-md font-bold mb-2 text-gray-700">Price Range</h3>
                <input type="range" id="priceRange" name="priceRange" min="{{ $minPrice }}" max="{{ $maxPrice }}"
                    value="{{ $maxPrice }}"
                    class="w-full h-2 bg-gray-200 rounded-full appearance-none focus:outline-none"
                    style="--range-thumb-color: #d97706;">
                <div class="flex justify-between text-sm text-gray-700">
                    <span>IDR {{ number_format($minPrice, 0, ',', '.') }}</span>
                    <span id="priceLabel">IDR {{ number_format($maxPrice, 0, ',', '.') }}</span>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="w-full md:w-3/4 p-6 overflow-y-auto">
            <!-- Header -->
            <header class="mb-6">
                <h1 class="text-3xl font-bold text-gray-900">Product Search</h1>
                <p class="text-gray-600">Find the best materials based on your preferences.</p>
            </header>

            <!-- Search Bar -->
            <div class="relative mb-4">
                <div class="relative flex items-center">
                    <input type="text" name="search" id="search" placeholder="Search products..."
                        value="{{ request()->query('query') }}"
                        class="w-full rounded-full border-gray-200 focus:border-amber-400 focus:ring-2 focus:ring-amber-400 px-4 py-2 pr-36">

                    <!-- Hidden file input -->
                    <input type="file" id="imageSearch" accept="image/*" class="hidden">

                    <!-- Button to search by image -->
                    <button type="button" id="triggerImageSearch"
                        class="absolute right-2 top-1/2 transform -translate-y-1/2 flex items-center gap-2 p-1 pl-3 pr-4 rounded-full bg-orange-600 text-gray-50 hover:bg-orange-400 transition-all text-sm">
                        <x-heroicon-o-camera class="h-5 w-5" />
                        <span>Search by Image</span>
                    </button>
                </div>
            </div>

            <!-- Semantic Search Tag -->
            <div id="semantic-tag-container" class="flex gap-2 mb-4">
                <span id="semantic-tag"
                    class="inline-flex items-center justify-center bg-orange-100 text-orange-600 rounded-full px-4 py-2 text-sm font-medium border border-orange-300 hidden">
                    Semantic Search
                    <button id="remove-semantic-tag" class="ml-2 text-gray-500 hover:text-gray-800">
                        <!-- Heroicon X as SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </span>
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
@endsection

@section('script')
    <script>
        const semanticToggle = document.getElementById('semantic-toggle');
        const toggleBackground = document.getElementById('toggle-background');
        const toggleBall = document.getElementById('toggle-ball');
        const semanticTag = document.getElementById('semantic-tag');

        // Listen for toggle change
        semanticToggle.addEventListener('change', function() {
            if (semanticToggle.checked) {
                // Show Semantic Search Tag and move the ball
                semanticTag.classList.remove('hidden');
                toggleBall.classList.add('translate-x-4');
                toggleBackground.classList.add('bg-orange-500'); // Change background to orange when active
            } else {
                // Hide Semantic Search Tag and reset the ball
                semanticTag.classList.add('hidden');
                toggleBall.classList.remove('translate-x-4');
                toggleBackground.classList.remove('bg-orange-500'); // Reset background to default when inactive
            }
        });

        // Remove Semantic Search Tag on close button click
        document.getElementById('remove-semantic-tag').addEventListener('click', function() {
            semanticToggle.checked = false;
            semanticTag.classList.add('hidden');
            toggleBall.classList.remove('translate-x-4');
            toggleBackground.classList.remove('bg-orange-500')
        });
    </script>
    <script>
        $(document).ready(function() {
            const sidebar = document.getElementById('sidebar');

            document.getElementById('floating-filter-btn').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const icon = document.getElementById('filter-icon');

                if (sidebar.classList.contains('-translate-x-full')) {
                    // Sidebar lagi ketutup, buka dia
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');

                    // Ganti icon jadi "X"
                    icon.outerHTML = `
                        <svg id="filter-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    `;
                } else {
                    // Sidebar lagi kebuka, tutup dia
                    sidebar.classList.remove('translate-x-0');
                    sidebar.classList.add('-translate-x-full');

                    // Ganti icon jadi "Filter" lagi
                    icon.outerHTML = `
                        <svg id="filter-icon" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 4.5h17.25M3 9.75h13.5m-13.5 5.25h17.25m-13.5 5.25h13.5" />
                        </svg>
                    `;
                }
            });

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
                        <div class="group relative bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-500 product-card transform hover:-translate-y-2">
                            <div class="flex flex-col md:flex-row">
                                <!-- Set a fixed width and height for the image -->
                                <div class="relative overflow-hidden h-80 w-full md:h-72 md:w-72">  <!-- Fixed height and width here -->
                                    <img src="${product.image}" alt="${product.name}" class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-105">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/0 to-transparent"></div>
                                    <div class="absolute top-4 right-4">
                                        <button class="p-2 bg-white/90 rounded-full shadow-md hover:bg-amber-500 hover:text-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0">
                                            <x-heroicon-o-heart class="h-5 w-5" />
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6 w-full md:w-[84%] flex flex-col justify-between">
                                    <div class="flex flex-col justify-start h-full">
                                        <h3 class="text-2xl font-medium mb-2">
                                            <a href="{{ url('products') }}/${product.id}" class="text-gray-900 hover:text-amber-600">${product.name}</a>
                                        </h3>
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            ${product.categories.map(cat => `<span class="bg-amber-50 text-amber-700 text-xs px-3 py-1 rounded-full border border-amber-100">${cat.name}</span>`).join('')}
                                        </div>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-5">${product.description}</p>
                                    </div>

                                    <div class="flex justify-between items-center mt-auto">
                                        <span class="text-xl text-amber-600">From IDR ${firstPrice.toLocaleString('id-ID')} / meter</span>
                                        <a href="{{ url('products') }}/${product.id}" class="px-4 py-2 border border-gray-300 text-sm rounded-full hover:bg-amber-600 hover:text-white hover:border-amber-600 transition-all duration-300">
                                            View Details
                                        </a>
                                    </div>
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

            // Saat tombol diklik, trigger file input
            $('#triggerImageSearch').click(function() {
                $('#imageSearch').click();
            });

            // Saat file dipilih
            $('#imageSearch').change(function() {
                const file = this.files[0];
                if (file) {
                    console.log('File selected:', file);
                }
            });
        });
    </script>
@endsection
