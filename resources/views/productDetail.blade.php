@extends('layout')

@section('styles')
    <title>{{ $product->name }} - Product Detail</title>
@endsection

@section('content')
    <div class="bg-white w-full p-6 rounded-lg shadow-md">
        <!-- Product Detail -->
        <div class="flex flex-col md:flex-row">
            <div class="w-full md:w-1/2 flex justify-center items-center mb-6 md:mb-0">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover rounded-md">
            </div>
            <div class="w-full md:w-1/2">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>

                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach ($product->categories as $category)
                        <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">{{ $category->name }}</span>
                    @endforeach
                </div>

                <div class="mt-4">
                    <h3 class="text-xl font-semibold text-gray-900">Price</h3>
                    @foreach ($productPrice as $price)
                        <p class="text-lg text-gray-800">IDR {{ number_format($price['price'], 0, ',', '.') }} / meter</p>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Add to Cart Button (if needed) -->
        <div class="mt-6">
            <button class="bg-pink-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-pink-700">
                Add to Cart
            </button>
        </div>
    </div>
@endsection
