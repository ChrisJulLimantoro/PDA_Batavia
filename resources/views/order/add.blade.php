@extends('layout')
@section('styles')
    <title>Order</title>
@endsection()
@section('content')
<div
    class="h-full md:h-3/4 max-h-[90vh] md:max-h-[70vh] w-full md:w-3/4 bg-white md:rounded-lg shadow-sm md:my-16 overflow-scroll bg-white"
>
    <div class="grid grid-cols-2 py-4 md:py-6">
        <!-- content -->
        <div class="grid grid-cols-1 md:grid-cols-2 w-full">
            <div class="md:flex flex-col mt-10 hidden h-full overflow-hidden justify-between">
                <div class="py-8">
                    <h2 class="text-xl lg:text-2xl font-bold text-pinkDark text-center mt-6">
                        Create Your First Company!
                    </h2>

                    <p class="text-md lg:text-lg text-pinkDark text-start mt-6 px-8">
                        The Company Here will be your first step into joining our community.
                        You can create a company that will be used to manage your stores.
                        You can also create multiple companies under one account.
                    </p>
                </div>

            </div>

            <form class="w-full" method="POST" action="">
                @csrf

                <div class="flex flex-col items-center justify-center px-8 py-8 gap-4">
                    <h2 class="w-full text-lg font-bold text-pinkDark text-start mt-2">
                        Company Form
                    </h2>

                    <!-- Code -->
                    <div class="w-full">
                        <label for="code" class="block text-sm font-medium text-pinkDark mb-1">Code</label>
                        <input
                            type="text"
                            name="code"
                            id="code"
                            class="w-full rounded-lg border-gray-300 focus:border-pinkDark focus:ring focus:ring-pinkDark focus:ring-opacity-50"
                            placeholder="Code"
                            value="{{ old('code') }}"
                            required
                        >
                        @error('code')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div class="w-full">
                        <label for="name" class="block text-sm font-medium text-pinkDark mb-1">Name</label>
                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="w-full rounded-lg border-gray-300 focus:border-pinkDark focus:ring focus:ring-pinkDark focus:ring-opacity-50"
                            placeholder="Name"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="w-full">
                        <label for="description" class="block text-sm font-medium text-pinkDark mb-1">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            class="w-full rounded-lg border-gray-300 focus:border-pinkDark focus:ring focus:ring-pinkDark focus:ring-opacity-50"
                            placeholder="Description"
                            rows="4"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full mt-4">
                        <!-- Already Have One Button -->
                        <div>
                            <a
                                href=""
                                class="w-full inline-block text-center bg-pinkGray text-pinkDark rounded-lg py-2 px-4 hover:bg-pinkLight hover:text-white transition duration-300"
                            >
                                Already Had One
                            </a>
                        </div>

                        <!-- Submit (Next) Button -->
                        <div>
                            <button
                                type="submit"
                                class="w-full bg-pinkDark text-white rounded-lg py-2 px-4 hover:bg-pinkOrange transition duration-300"
                            >
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection()
@section('scripts')
    <script>
        // const cursor = document.querySelector("#cursor");
        // document.addEventListener("mousemove", (e) => {
        //     cursor.style.left = e.pageX + "px";
        //     cursor.style.top = e.pageY + "px";
        // });
    </script>
@endsection()
