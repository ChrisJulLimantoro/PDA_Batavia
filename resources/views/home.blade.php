@extends('layout')
@section('content')
<div class="w-full max-w-screen-2xl mx-auto px-4 sm:px-8 font-inria bg-white text-gray-800">

    <div class="relative w-full h-[36rem] md:h-[44rem] overflow-hidden mt-6">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/40 to-gray-900/20 z-0"></div>
        <img src="{{ asset('images/title_image.png') }}" alt="Traditional Textiles" class="w-full h-full object-cover object-center transition-all duration-1000 ease-in-out hero-image">
        
        <div class="absolute inset-0 flex flex-col items-center justify-center z-10 px-6">
            <div class="max-w-4xl text-center">
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-light leading-tight text-white tracking-wide hero-title transform translate-y-10 opacity-0">
                    <span class="font-serif italic">Timeless Elegance</span> in Every Thread
                </h1>
                <p class="mt-6 text-lg md:text-xl text-white/90 max-w-2xl mx-auto font-light hero-subtitle transform translate-y-10 opacity-0">
                    From intricate patterns to handcrafted artistry, explore Indonesia's textile heritage through our curated collection.
                </p>
            </div>
            
            <div class="mt-10 w-full max-w-2xl hero-form transform translate-y-10 opacity-0">
                <form action="/search" method="GET" class="relative">
                    <div class="relative flex items-center">
                        <input
                            type="text"
                            name="query"
                            placeholder="Discover our collection..."
                            class="w-full px-4 py-3 pr-40 rounded-full border-0 focus:ring-2 focus:ring-amber-400 text-lg shadow-xl bg-white/95 backdrop-blur-sm placeholder-gray-400 font-light tracking-wide">
                        <button
                            type="submit"
                            class="absolute right-2 bg-orange-500 hover:bg-amber-700 text-white px-2 py-2 rounded-full font-medium tracking-wide transition-all duration-300 hover:shadow-lg transform hover:scale-[1.02]">
                            Find Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 py-16 md:py-24">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-light mb-4">Our Textile Traditions</h2>
            <div class="w-20 h-px bg-amber-500 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            @foreach([
                'Batik' => ['image' => 'batik.png', 'description' => 'Wax-resist dyeing artistry'],
                'Tenun' => ['image' => 'tenun.png', 'description' => 'Traditional handwoven fabrics'],
                'Songket' => ['image' => 'songket.png', 'description' => 'Luxurious gold-threaded textiles'],
                'Tritik' => ['image' => 'tritik.png', 'description' => 'Intricate stitch-resist technique']
            ] as $category => $data)
            <a href="#" class="group relative block h-80 md:h-96 overflow-hidden rounded-xl shadow-md hover:shadow-xl transition-all duration-500">
                <div class="absolute inset-0 bg-cover bg-center transition-all duration-700 group-hover:scale-105" style="background-image: url('{{ asset('images/' . $data['image']) }}');"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                <div class="relative h-full flex flex-col justify-end p-6 text-white">
                    <h3 class="text-2xl font-medium mb-1 transform group-hover:translate-y-0 translate-y-2 transition-transform duration-300">{{ $category }}</h3>
                    <p class="text-sm opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-4 transition-all duration-300 delay-100">{{ $data['description'] }}</p>
                    <div class="w-8 h-px bg-amber-400 mt-3 mb-2 transform group-hover:scale-x-100 scale-x-0 origin-left transition-transform duration-300 delay-200"></div>
                    <span class="text-xs font-light opacity-0 group-hover:opacity-100 transform group-hover:translate-y-0 translate-y-4 transition-all duration-300 delay-300">View Collection →</span>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <div class="bg-gray-50 md:py-24 px-4 sm:px-6 opacity-0 md:opacity-100">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-light mb-4">Textile Regions of Indonesia</h2>
                <p class="text-gray-600 max-w-2xl mx-auto font-light">Discover the rich diversity of textile traditions across the archipelago</p>
                <div class="w-20 h-px bg-amber-500 mx-auto mt-6"></div>
            </div>
            
            <div class="relative w-full max-w-5xl mx-auto p-8 rounded-xl ">
                <div class="map-container relative">
                    <div id="map-tooltip" class="absolute bg-gray-900 text-white px-3 py-2 rounded text-sm pointer-events-none opacity-0 transition-opacity"></div>
                    <object data="{{ asset('images/indonesia.svg') }}" type="image/svg+xml" class="w-full h-auto">
                        <img src="{{ asset('images/indonesia.svg') }}" alt="Indonesia Map" class="w-full h-auto">
                    </object>
                </div>
            </div>
        </div>
    </div>

    <div class="relative w-full h-[32rem] md:h-[36rem] overflow-hidden group">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900/50 to-gray-900/30 z-0 transition-all duration-700 group-hover:opacity-90"></div>
        <img src="{{ asset('images/banner2.png') }}" alt="Artisan at work" class="w-full h-full object-cover object-center transition-all duration-1000 ease-in-out group-hover:scale-105">
        
        <div class="absolute inset-0 flex items-center px-8 md:px-16 lg:px-24 z-10">
            <div class="max-w-2xl">
                <span class="text-amber-400 font-light tracking-widest text-sm mb-4 block">HERITAGE & CRAFTSMANSHIP</span>
                <h2 class="text-3xl md:text-5xl font-light leading-tight text-white mb-6">
                    <span class="italic">Indonesia</span> is a land of stories woven into every thread.
                </h2>
                <p class="text-white/90 font-light text-lg mb-8 max-w-lg">
                    Each textile carries generations of knowledge, from natural dye techniques to symbolic motifs that speak of our cultural identity.
                </p>
                <button class="px-8 py-3 bg-transparent border border-amber-400 text-amber-400 hover:bg-amber-400 hover:text-white transition-all duration-300 rounded-full font-medium tracking-wide">
                    Discover the Stories
                </button>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 py-16 md:py-24">
        <div class="text-center mb-16 section-title opacity-1 transform translate-y-10">
            <span class="text-amber-600 tracking-widest text-sm font-medium">CURATED SELECTION</span>
            <h2 class="text-3xl md:text-4xl font-light mt-4 mb-4">Artisanal Masterpieces</h2>
            <div class="w-20 h-px bg-amber-500 mx-auto"></div>
            <p class="text-gray-600 mt-6 max-w-2xl mx-auto font-light italic">Each piece is individually selected for its exceptional craftsmanship</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10 product-grid">
            @foreach([
                ['title' => 'Songket Palembang', 'price' => '1.250.000', 'description' => 'Gold-threaded ceremonial textile'],
                ['title' => 'Batik Tulis Yogyakarta', 'price' => '850.000', 'description' => 'Hand-drawn using traditional canting'],
                ['title' => 'Tenun Ikat Flores', 'price' => '1.750.000', 'description' => 'Natural dyes with symbolic patterns']
            ] as $product)
            <div class="group relative bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-500 product-card transform hover:-translate-y-2">
                <div class="relative overflow-hidden h-96">
                    <img 
                        src="{{ asset('images/kain_songket_palembang.jpg') }}" 
                        alt="{{ $product['title'] }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/0 to-transparent"></div>
                    <div class="absolute top-4 right-4">
                        <button class="p-2 bg-white/90 rounded-full shadow-md hover:bg-amber-500 hover:text-white transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0">
                        <x-heroicon-o-heart class="h-5 w-5" />

                        </button>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-medium mb-1">{{ $product['title'] }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $product['description'] }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-amber-600 font-medium">IDR {{ $product['price'] }}</span>
                        <button class="px-4 py-2 border border-gray-300 text-sm rounded-full hover:bg-amber-600 hover:text-white hover:border-amber-600 transition-all duration-300">
                            View Details
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-16">
            <button class="px-8 py-3 border border-gray-300 rounded-full hover:bg-gray-900 hover:text-white transition-all duration-300 font-medium tracking-wide">
                Explore Full Collection
            </button>
        </div>
    </div>

    <div class="container mx-auto px-4 sm:px-6 py-16 md:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 md:gap-12">
            <div class="relative h-[32rem] md:h-[36rem] rounded-xl overflow-hidden shadow-lg group">
                <img 
                    src="{{ asset('images/kain_songket_palembang.jpg') }}" 
                    alt="Artisan at work"
                    class="w-full h-full object-cover transition-transform duration-1000 ease-in-out group-hover:scale-105"
                >
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent flex items-end p-8">
                    <div class="text-white transform translate-y-10 group-hover:translate-y-0 transition-all duration-500">
                        <span class="text-amber-300 text-sm font-medium tracking-wider">MASTERPIECE SPOTLIGHT</span>
                        <h3 class="text-2xl md:text-3xl font-light mt-2 mb-3">Songket Palembang</h3>
                        <p class="text-white/90 font-light max-w-md opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-200">
                            Woven with gold and silver threads, this royal textile embodies the grandeur of Srivijaya heritage.
                        </p>
                        <button class="mt-4 px-6 py-2 border border-white/30 rounded-full text-sm hover:bg-white hover:text-gray-900 transition-all duration-300 opacity-0 group-hover:opacity-100 transform translate-y-2 group-hover:translate-y-0 delay-300">
                            Learn the History →
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="relative flex flex-col justify-between bg-gray-50 rounded-xl p-8 md:p-10 h-[52rem] md:h-[36rem] overflow-hidden">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-amber-100 rounded-full opacity-10"></div>
                <div class="absolute -left-10 -bottom-10 w-48 h-48 bg-amber-200 rounded-full opacity-10"></div>
                
                <div class="relative z-10">
                    <span class="text-xs font-semibold tracking-wider text-amber-600">ARTISANAL HERITAGE</span>
                    <h2 class="text-3xl md:text-4xl font-light text-gray-800 mt-4 mb-6">The Art Behind the Fabric</h2>
                    <p class="text-gray-600 leading-relaxed max-w-md font-light">
                        Our textiles are more than just fabric - they're the result of generations of knowledge, 
                        with techniques passed down through families. Each piece requires weeks, sometimes months 
                        of meticulous handwork.
                    </p>
                </div>

                <div class="relative z-10 mt-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                            <div class="text-amber-500 mb-3">
                            <x-heroicon-o-check-circle class="h-8 w-8" />

                            </div>
                            <h4 class="font-medium mb-2">Authentic Techniques</h4>
                            <p class="text-sm text-gray-500">Traditional methods preserved for generations</p>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-all duration-300">
                            <div class="text-amber-500 mb-3">
                            <x-heroicon-o-bolt class="h-8 w-8" />

                            </div>
                            <h4 class="font-medium mb-2">Natural Materials</h4>
                            <p class="text-sm text-gray-500">Using organic dyes and premium fibers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16 md:py-24 px-4 sm:px-6 partners-section opacity-0">
        <div class="container mx-auto">
            <div class="text-center mb-16">
                <span class="text-sm font-medium tracking-widest text-amber-600">TRUSTED COLLABORATIONS</span>
                <h2 class="text-3xl md:text-4xl font-light mt-4 mb-6">Our Esteemed Partners</h2>
                <div class="w-20 h-px bg-amber-500 mx-auto"></div>
                <p class="text-gray-600 mt-6 max-w-2xl mx-auto font-light">
                    Collaborating with the finest artisans and organizations to preserve Indonesia's textile heritage
                </p>
            </div>
            
            <div class="relative">
                <div class="absolute inset-y-0 left-0 w-16 bg-gradient-to-r from-gray-50 to-transparent z-10"></div>
                
                <div id="logo-container" class="overflow-hidden py-4">
                    <ul id="logos" class="flex items-center justify-center [&_li]:mx-8 [&_img]:max-w-[8rem] [&_img]:opacity-70 [&_img]:hover:opacity-100 [&_img]:transition-all [&_img]:duration-300 animate-loop-scroll">
                        @for ($i = 0; $i < 8; $i++)
                        <li>
                            <img src="{{ asset('images/logo.jpg') }}" alt="Partner Logo" class="h-12 object-contain" />
                        </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        scroll-behavior: smooth;
    }


    

    
    #map-tooltip.show {
        opacity: 1;
    }

    .map-container {
        position: relative;
        padding: 20px;
    }
</style>


<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
<script src="{{ asset('js/home-animations.js') }}"></script>
@endsection