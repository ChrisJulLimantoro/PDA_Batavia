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
            position: relative;
            overflow: hidden; /* Ensure no scrollbars are shown */
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('{{ asset("images/textil-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            filter: blur(5px); /* Apply the filter effect */
            opacity: 0.1;
            z-index: -1; /* Make sure it stays behind all content */
        }
    </style>
    <title>Login</title>

    <style>
        .button {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 9px 12px;
            gap: 8px;
            height: 40px;
            width: 100%;
            border: none;
            background: #e2400f;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            z-index: 300;
        }

        .svg-icon {
            fill: white;
        }

        .lable {
            line-height: 22px;
            color: #fff;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .button:hover {
            background: #fff;
            color: #e2400f;
            border: 1px solid #e2400f;
        }

        .button:hover .lable {
            /* background: #fff; */
            color: #e2400f;
        }

        .button:hover .svg-icon {
            animation: slope 1s linear infinite;
            fill: #e2400f;
        }

        #loginForm {
            background: #ffffff;
            align-items: center;
        }

       
    </style>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body class="p-0 m-0 overflow-y-auto h-full font-inria relative">
    <div class="w-screen h-screen flex justify-center items-center bg-transparent"> 
        {{-- Center this --}}
        <div class="w-auto h-auto xl:w-1/2 xl:h-1/2 p-10 bg-white rounded-xl shadow-2xl" id="loginForm" data-aos="zoom-in"> 
            <div class="w-full" data-aos="zoom-in" data-aos-delay="200">
                <div class="align-items-center justify-center">
                    <img src="{{ asset('appLogo.svg') }}" alt="Logo" class="w-1/2 mx-auto">
                </div>
            </div>
            <div class="w-full mt-8">
                <form action="{{ route('login') }}" method="POST" id="login-form">
                    @csrf
                    {{-- Form Username / Email --}}
                    <div class="flex flex-col">
                        <label for="email" class="text-white text-sm xl:text-lg text-start">Username / Email</label>
                        <input type="text" name="email" id="email"
                            class="w-full h-10 rounded-lg bg-white border-2 border-gray-300 focus:outline-none focus:border-[#755eb0] px-3"
                            placeholder="Username / Email" required value="{{ old('email') }}">
                    </div>

                    {{-- Form Password --}}
                    <div class="flex flex-col mt-4">
                        <label for="password" class="text-white text-sm xl:text-lg text-start">Password</label>
                        <input type="password" name="password" id="password"
                            class="w-full h-10 rounded-lg bg-white border-2 border-gray-300 focus:outline-none focus:border-[#755eb0] px-3"
                            placeholder="Password" required value="{{ old('password') }}">
                    </div>

                    {{-- Login Button --}}
                    <button type="submit" class="button mt-8">
                        <span class="label text-sm text-white xl:text-lg">LOGIN</span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        AOS.init();
        $(document).ready(function() {
            @if (Session::has('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oopss...',
                    text: '{{ Session::get('error') }}',
                    showConfirmButton: false,
                    timer: 2500
                });
            @endif
        });
    </script>
    <!-- Add this to your HTML body or in a separate script -->
</body>
</html>
