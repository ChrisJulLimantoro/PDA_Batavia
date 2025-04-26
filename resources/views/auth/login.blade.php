@extends('layout')
@section('styles')
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
            background: #755eb0;
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
            color: #755eb0;
            border: 1px solid #755eb0;
        }

        .button:hover .lable {
            /* background: #fff; */
            color: #755eb0;
        }

        .button:hover .svg-icon {
            animation: slope 1s linear infinite;
            fill: #755eb0;
        }

        #loginForm {
            backdrop-filter: blur(50px);
            background: rgba(255, 255, 255, 0.1);
            align-items: center;
        }

       
    </style>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
@endsection
@section('content')
    {{-- <div id="cursor"></div>
    <div id="cursor_2"></div> --}}
    <div class="m-auto w-full h-full xl:w-1/2 xl:h-1/2 p-10 bg-white rounded-xl shadow-2xl" id="loginForm" data-aos="zoom-in">
        <div class="w-full" data-aos="zoom-in" data-aos-delay="200">
            <div class="align-items-center justify-center font-dillan">
                <h1 class="font-dillan text-[6vw] font-bold xl:text-[4vw] text-white drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]"
                    id="judul1">
                    LOGIN
                </h1>
            </div>
        </div>
        <div class="w-full mt-8">
            <form
            action="{{ route('login') }}"
            method="POST" id="login-form">
            @csrf
            {{-- Form Username / Email --}}
            <div class="flex flex-col" >
                <label for="email" class="text-white text-sm xl:text-lg text-start">Username / Email</label>
                <input type="text" name="email" id="email"
                    class="w-full h-10 rounded-lg bg-white border-2 border-gray-300 focus:outline-none focus:border-[#755eb0] px-3"
                    placeholder="Username / Email" required value="{{ old('email') }}">
            </div>
            
            {{-- Form Password --}}
            <div class="flex flex-col mt-4" >
                <label for="password" class="text-white text-sm xl:text-lg text-start">Password</label>
                <input type="password" name="password" id="password"
                    class="w-full h-10 rounded-lg bg-white border-2 border-gray-300 focus:outline-none focus:border-[#755eb0] px-3"
                    placeholder="Password" required value="{{ old('password') }}">
            </div>
            
            {{-- Login Button --}}
            <button type="submit" class="button font-asap mt-8">
                <span class="lable text-sm xl:text-lg">LOGIN</span>
            </button>
        </form>
        
        </div>
    </div>
@endsection

@section('script')
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
<script>
</script>
    </html>
@endsection
