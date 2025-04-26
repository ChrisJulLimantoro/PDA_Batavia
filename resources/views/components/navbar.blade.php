<nav class="w-full px-8 py-4 bg-white shadow-md flex justify-between items-center fixed top-0 z-50">
    <!-- Logo -->
    <div class="text-xl font-bold text-gray-800">
        Logo
    </div>

    <!-- Navigation Links -->
    <ul id="nav-links" class="absolute left-1/2 transform -translate-x-1/2 flex space-x-10 text-gray-800 text-lg">
        <li><a href="/" class="hover:text-orange-700">Home</a></li>
        <li><a href="/about" class="hover:text-orange-700">About Us</a></li>
        <li><a href="/products" class="hover:text-orange-700">Products</a></li>
        <li><a href="/consult" class="hover:text-orange-700">Consult Your Idea</a></li>
    </ul>

    <!-- Buttons -->
    <div class="flex space-x-4">
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded">
            Sign Up
        </button>
        <button class="bg-orange-600 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded">
            Login
        </button>
    </div>
</nav>

<script>
    const path = window.location.pathname;
    const links = document.querySelectorAll('#nav-links a');

    links.forEach(link => {
        if (link.getAttribute('href') === path) {
            link.classList.add('border-b-2', 'border-blue-500', 'pb-1');
        }
    });
</script>
