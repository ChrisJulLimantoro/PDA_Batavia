<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- CDN for tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    {{-- CDN for JQUERY --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

    {{-- CDN for Tailwind Element --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>

    <!-- ThreeJs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/0.148.0/three.min.js"></script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;600;700;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    'asap': ["Asap"],
                    'dillan': ["dillan"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };
    </script>

    {{-- CDN for SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- CDN for AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        @font-face {
            font-family: dillan;
            src: url('{{ asset('assets/dillan.otf') }}') format('truetype');
        }

        canvas {
            margin: auto;
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100% !important;
            height: 100vh !important;
            z-index: 0;
        }

        body {
            background: rgb(16, 23, 57);
            background: linear-gradient(180deg, rgba(16, 23, 57, 1) 0%, rgba(48, 63, 107, 1) 50%, rgba(86, 71, 120, 1) 100%);
            /* cursor: url('{{ asset('assets/baymax-touch-smol.png') }}') 25 25, auto; */
        }
    </style>

    @yield('styles')

</head>

<body class="p-0 m-0 overflow-hidden h-screen font-asap relative">
    <header class="p-6">
        <h1 class="text-2xl font-bold">BATAVIA</h1>
    </header>
    <div class="" style="z-index: 1;">
        @yield('content')
    </div>
    <footer class="p-6">
        <p class="text-center text-sm">© 2025 BATAVIA. @PDA All rights reserved.</p>
    </footer>
    @yield('script')

</body>

</html>
