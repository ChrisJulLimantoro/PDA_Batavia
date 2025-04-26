@extends('layout')

@section('styles')
<title>{{ $product->name }} - Luxe Textiles</title>
<style>
    .textual-ornament {
        position: relative;
        display: inline-block;
    }

    .textual-ornament::after {
        content: "";
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60%;
        height: 2px;
        background: linear-gradient(90deg, #d4a762, transparent);
    }

    .image-gallery-thumbnail {
        transition: all 0.3s ease;
        border: 1px solid transparent;
    }

    .image-gallery-thumbnail:hover,
    .image-gallery-thumbnail.active {
        border-color: #d4a762;
        transform: translateY(-3px);
    }

    .price-tag {
        background: linear-gradient(135deg, #f5f5f5, #ffffff);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    }

    .material-spec {
        position: relative;
        padding-left: 24px;
    }

    .material-spec::before {
        content: "•";
        position: absolute;
        left: 8px;
        color: #d4a762;
        font-size: 1.2rem;
    }
</style>
@endsection

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <nav class="mb-8 opacity-0 transform translate-y-5" id="breadcrumb-anim">
            <ol class="flex items-center space-x-2 text-sm">
                <li>
                    <a href="/" class="text-gray-500 hover:text-amber-600 transition-colors">Home</a>
                </li>
                <li class="text-gray-400">/</li>
                <li>
                    <a href="/products" class="text-gray-500 hover:text-amber-600 transition-colors">Collections</a>
                </li>
                <li class="text-gray-400">/</li>
                <li class="text-amber-600 font-medium truncate max-w-xs">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6 md:p-10">
                <div class="space-y-4 opacity-0" id="gallery-anim">
                    <div class="relative overflow-hidden rounded-lg bg-gray-100 aspect-[4/5] flex items-center justify-center">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}"
                            class="w-full h-full object-cover transition-opacity duration-500"
                            id="main-product-image">
                        <div class="absolute top-4 left-4 bg-amber-600 text-white px-3 py-1 rounded-full text-xs font-medium tracking-wider shadow-md">
                            Handcrafted
                        </div>
                    </div>

                    <div class="grid grid-cols-4 gap-3">
                        @for($i = 0; $i < min(4, 3); $i++)
                            <button class="image-gallery-thumbnail aspect-square rounded-md overflow-hidden bg-gray-100 {{ $i === 0 ? 'active' : '' }}"
                            onclick="changeMainImage('{{ $product->image }}')">
                            <img src="{{ $product->image }}" alt="Thumbnail {{ $i+1 }}" class="w-full h-full object-cover">
                            </button>
                            @endfor
                            <div class="aspect-square rounded-md bg-gray-100 flex items-center justify-center text-gray-400">
                                <span class="hi hi-plus inline-block h-6 w-6"></span>
                            </div>
                    </div>
                </div>

                <div class="opacity-0 transform translate-x-5" id="info-anim">
                    <h1 class="text-3xl md:text-4xl font-serif font-light text-gray-900 mb-2">
                        <span class="textual-ornament">{{ $product->name }}</span>
                    </h1>

                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach ($product->categories as $category)
                        <span class="bg-amber-50 text-amber-700 text-xs px-3 py-1 rounded-full border border-amber-100">
                            {{ $category->name }}
                        </span>
                        @endforeach
                    </div>

                    <div class="prose max-w-none text-gray-600 mb-8 font-light">
                        <p class="leading-relaxed">{{ $product->description }}</p>
                    </div>

                    <div class="border-t border-gray-100 my-6"></div>

                    <div class="mb-8">
                        <h3 class="text-sm font-medium text-gray-500 mb-2">PRICING</h3>
                        <div class="space-y-4 p-4 bg-white rounded-lg shadow-sm">
                        @foreach ($productPrice as $price)
                            <div class="flex flex-col">
                                <div class="flex items-center justify-between">
                                    <div class="text-gray-800 font-semibold">
                                        {{ $price['variant'] ?? 'Standard' }}
                                    </div>
                                    <div class="text-amber-700 font-serif text-lg font-medium">
                                        IDR {{ number_format($price['price'], 0, ',', '.') }} 
                                        <span class="text-sm font-normal text-gray-500">/ meter</span>
                                    </div>
                                </div>
                                @if (!empty($price['moq']))
                                    <div class="text-sm text-gray-500 mt-1">
                                        Min Order: {{ $price['moq'] }} meter{{ $price['moq'] > 1 ? 's' : '' }}
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    </div>

                    <div class="mb-8">
                        <h3 class="text-sm font-medium text-gray-500 mb-3">MATERIAL DETAILS</h3>
                        <ul class="space-y-2">
                            <li class="material-spec text-gray-600">100% Organic Cotton</li>
                            <li class="material-spec text-gray-600">Natural Dyes</li>
                            <li class="material-spec text-gray-600">Handwoven Technique</li>
                            <li class="material-spec text-gray-600">Traditional Motifs</li>
                        </ul>
                    </div>

                    <div class="flex space-x-4">
                        <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                            <button type="button" id="decrement" class="px-3 py-2 text-gray-500 hover:bg-gray-100 transition-colors">
                                <span class="hi hi-minus inline-block h-5 w-5">-</span>
                            </button>
                            <div class="flex items-center justify-center space-x-3">

                                <span id="quantity" class="min-w-[2rem] text-center text-lg font-medium">1</span>
                                
                                <input type="hidden" name="quantity" id="hidden-quantity" value="1">

                            </div>

                            <button type="button" class="px-3 py-2 text-gray-500 hover:bg-gray-100 transition-colors" id="increment">
                                <span class="hi hi-plus inline-block h-5 w-5"> + </span>
                            </button>
                        </div>
                        <button class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-300 flex items-center justify-center" type="button" id="order-button">
                            <span class="hi hi-shopping-cart inline-block h-5"></span>
                            Buy Now
                        </button>
                        <button class="flex-1 bg-amber-600 hover:bg-amber-700 text-white font-medium py-3 px-6 rounded-lg transition-colors duration-300 flex items-center justify-center" type="button" id="collab-button">
                            <span class="hi hi-shopping-cart inline-block h-5"></span>
                            Request Collaboration
                        </button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
<script src="{{ asset('js/productDetail-animation.js') }}"></script>
<script>
    const decrementBtn = document.getElementById('decrement');
    const incrementBtn = document.getElementById('increment');
    const quantitySpan = document.getElementById('quantity');
    const hiddenQuantityInput = document.getElementById('hidden-quantity');
    let quantity = 1;

    decrementBtn.addEventListener('click', () => {
        if (quantity > 1) {
            quantity--;
            quantitySpan.textContent = quantity;
            hiddenQuantityInput.value = quantity;
        }
    });

    incrementBtn.addEventListener('click', () => {
        quantity++;
        quantitySpan.textContent = quantity;
        hiddenQuantityInput.value = quantity;
    });

    const orderBtn = document.getElementById('order-button');
    const collabBtn = document.getElementById('collab-button');

    orderBtn.addEventListener('click', () => {
        window.location.href = '{{ route("order.add") }}'.'?product_id='.'{{ $product->id }}'.'&quantity='.quantity;
    })
    collabBtn.addEventListener('click', () => {
        window.location.href = '{{ route("order.custom") }}'.'?product_id='.'{{ $product->id }}'.'&quantity='.quantity;
    })
</script>
@endsection