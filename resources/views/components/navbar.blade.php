<nav class="w-full px-6 py-3 bg-white md:shadow-md flex items-center justify-between fixed top-0 z-50 h-[6.2vh]">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
        <img src="appLogo.svg" alt="App Logo" class="h-12 w-auto">
    </div>

    <!-- Desktop Navigation Links -->
    <div class="hidden md:flex items-center space-x-10 text-gray-800 text-lg">
        <a href="{{ route('home') }}" class="hover:text-orange-700">Home</a>
        <a href="" class="hover:text-orange-700">About Us</a>
        <a href="{{ route('products') }}" class="hover:text-orange-700">Products</a>
        <a href="" class="hover:text-orange-700">Consult Your Idea</a>
    </div>

    <!-- Buttons -->
    <div class="hidden md:flex space-x-4">
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Sign Up
        </button>
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Login
        </button>
    </div>

    <!-- Mobile Menu Button -->
    <button id="menu-btn" class="block md:hidden text-gray-800 focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
</nav>

<!-- Mobile Menu (terpisah, hanya muncul di mobile) -->
<div id="nav-menu"
    class="hidden md:hidden flex flex-col space-y-4 bg-white px-6 py-4 mt-[72px] shadow-md fixed w-full top-0 z-40">
    <a href="/" class="hover:text-orange-700">Home</a>
    <a href="/about" class="hover:text-orange-700">About Us</a>
    <a href="/products" class="hover:text-orange-700">Products</a>
    <a href="/consult" class="hover:text-orange-700">Consult Your Idea</a>
    <div class="flex flex-col space-y-2 pt-2 border-t">
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Sign Up
        </button>
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Login
        </button>
    </div>
</div>

<script>
    const path = window.location.pathname;
    const links = document.querySelectorAll('nav a, #nav-menu a');

    links.forEach(link => {
        if (link.getAttribute('href') === path) {
            link.classList.add('border-b-2', 'border-orange-600', 'pb-1');
        }
    });

    const menuBtn = document.getElementById('menu-btn');
    const navMenu = document.getElementById('nav-menu');

    menuBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });
</script>
