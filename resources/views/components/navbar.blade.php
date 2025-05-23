<nav class="w-full px-6 py-3 bg-white md:shadow-md flex items-center justify-between fixed top-0 z-50 h-[6.2vh]">
    <!-- Logo dengan redirect ke home -->
    <div class="flex items-center space-x-2">
        <a href="{{ route('home') }}">
            <img src="{{ asset('appLogo.svg') }}" alt="App Logo" class="h-12 w-auto">
        </a>
    </div>


    <!-- Desktop Navigation Links -->
    <div class="hidden md:flex items-center space-x-10 text-gray-800 text-lg">
        <a href="{{ route('home') }}" class="hover:text-orange-700">Home</a>
        <a href="" class="hover:text-orange-700">About Us</a>
        <a href="{{ route('products') }}" class="hover:text-orange-700">Products</a>
    </div>

    <!-- Buttons -->
    <div class="hidden md:flex space-x-4">
        @if(!Session::has('user_id'))
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Sign Up
        </button>
        <a href="{{ route('login') }}" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Login
        </a>
        @else
        <a href="{{ route('logout') }}" class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Logout
        </a>
        @endif
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
    class="hidden md:hidden flex flex-col space-y-4 bg-white px-6 py-4 mt-[6.2vh] shadow-md fixed w-full top-0 z-40">
    <a href="{{ route('home') }}" class="hover:text-orange-700">Home</a>
    <a href="/about" class="hover:text-orange-700">About Us</a>
    <a href="{{ route('products') }}" class="hover:text-orange-700">Products</a>
    <div class="flex flex-col space-y-2 pt-2 border-t">
        @if(!Session::has('user_id'))
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Sign Up
        </button>
        <a href="{{ route('login') }}" class="text-center bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Login
        </a>
        @else
        <a href="{{ route('logout') }}" class="text-center bg-orange-600 hover:bg-orange-700 text-white font-semibold text-sm py-2 px-4 rounded">
            Logout
        </a>
        @endif
    </div>
</div>

<script>
    // Get the current path of the page
    const path = window.location.pathname;

    // Select all anchor tags in the navigation
    const links = document.querySelectorAll('nav a, #nav-menu a');

    // Function to clean the URL path (remove trailing slashes)
    const cleanPath = (url) => {
        return url.endsWith('/') ? url.slice(0, -1) : url;
    };

    // Loop through each link
    links.forEach(link => {
        // Get the href of the link and clean it
        const linkHref = cleanPath(link.getAttribute('href'));

        // Compare the cleaned href of the link with the current path
        if (cleanPath(path) === linkHref) {
            // Add classes to underline the active link
            link.classList.add('border-b-2', 'border-orange-600', 'pb-1');
            link.classList.remove('hover:text-orange-700'); // Remove hover effect to show underline
        } else {
            link.classList.add('hover:text-orange-700'); // Add hover effect for non-active links
        }
    });

    // Toggle mobile menu visibility
    const menuBtn = document.getElementById('menu-btn');
    const navMenu = document.getElementById('nav-menu');

    menuBtn.addEventListener('click', () => {
        navMenu.classList.toggle('hidden');
    });
</script>
