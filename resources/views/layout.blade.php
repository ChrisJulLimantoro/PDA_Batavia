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

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Asap:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif&display=swap" rel="stylesheet">


    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    'asap': ["Asap"],
                    'dillan': ["dillan"],
                    'inria': ["inria"],
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
            background: #ffffff;
        }
    </style>

    @yield('styles')

</head>

<body class="p-0 m-0 overflow-auto h-screen font-inria relative">

    {{-- Navbar --}}
    @include('components.navbar')

    <div class="w-full h-full justify-center items-center flex flex-col bg-transparent mt-[6.2vh]">
        @yield('content')
    </div>

    @yield('script')
</body>

</html>
