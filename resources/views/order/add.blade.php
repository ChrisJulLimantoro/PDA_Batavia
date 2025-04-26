@extends('layout')
@section('styles')
    <title>Order</title>
@endsection()
@section('content')
<div
    class="h-full md:h-3/4 max-h-[90vh] md:max-h-[70vh] w-full md:w-3/4 bg-white md:rounded-lg shadow-sm md:my-16 overflow-scroll bg-white"
>  
        <!-- Title Stepper OnBoarding Step -->
		<div class="grid grid-cols-2 py-4 md:py-6">
			<!-- Step 1 -->
			<div class="flex flex-col items-center">
				<div
					class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-black text-white"
				>
					1
				</div>
				<div class="mt-2 text-sm text-center">
					Place Your Order
				</div>
			</div>

			<!-- Step 2 -->
				<div class="flex flex-col items-center">
					<div
						class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-white border border-pinkDark"
					>
						2
					</div>
					<div class="mt-2 text-sm text-center">
						Payment
					</div>
				</div>
		</div>
        {{-- Horizontal --}}
        <hr class="border-t border-gray-300 border-opacity-50" />
        <!-- content -->
        <div class="grid grid-cols-1 md:grid-cols-2 w-full">
            <div class="md:flex flex-col mt-10 hidden h-full overflow-hidden justify-between">
                <div class="py-8">
                    <h2 class="text-xl lg:text-2xl font-bold text-center mt-6">
                        Place Your Order!
                    </h2>

                    <p class="text-md lg:text-lg text-start mt-6 px-8">
                        The Company Here will be your first step into joining our community.
                        You can create a company that will be used to manage your stores.
                        You can also create multiple companies under one account.
                    </p>
                </div>

                </div>

            <form class="w-full" method="POST" action="{{ route('order.add.post') }}">
                @csrf
                <div class="flex flex-col items-center justify-center px-8 py-8 gap-4">
                    <h2 class="w-full text-lg font-bold text-start mt-2">
                        Order Form
                    </h2>

                    <!-- Product ID -->
                    <div class="relative w-full">
                        <label for="product_id" class="block text-sm font-medium mb-1">Product</label>
                        <select
                            name="product_id"
                            id="product_id"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 flex items-center justify-between gap-2 transition duration-300 ease-in-out"
                        >
                            <option value="" disabled selected>Select a product</option>
                            @foreach($products as $p)
                                <option value="{{ $p['id'] }}" style="background-color: white; color: #333;">{{ $p['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Quantity -->
                    <div class="w-full">
                        <label for="quantity" class="block text-sm font-medium mb-1">Quantity</label>
                        <input
                            type="number"
                            name="quantity"
                            id="quantity"
                            class="w-full rounded-lg border-gray-300 focus:ring-opacity-50"
                            placeholder="Quantity"
                            value="{{ old('quantity') }}"
                            required
                        >
                        @error('quantity')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Address -->
                    <div class="w-full">
                        <label for="address" class="block text-sm font-medium mb-1">Address</label>
                        <textarea
                            name="address"
                            id="address"
                            class="w-full rounded-lg border-gray-300 focus:ring-opacity-50"
                            placeholder="address"
                            rows="2"
                        >{{ old('address') }}</textarea>
                        @error('address')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="w-full">
                        <label for="description" class="block text-sm font-medium mb-1">Description</label>
                        <textarea
                            name="description"
                            id="description"
                            class="w-full rounded-lg border-gray-300 focus:ring-opacity-50"
                            placeholder="Description"
                            rows="3"
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full mt-4 items-center">
                        <!-- Already Have One Button -->
                        <div class="h-full">
                            <a
                                href="{{ route('order.custom') }}"
                                class="h-full w-full inline-block bg-gray-100 text-center rounded-lg py-2 px-4 transition duration-300"
                            >
                                Change to Request Collaboration
                            </a>
                        </div>

                        <!-- Submit (Next) Button -->
                        <div class=h-full>
                            <button
                                type="submit"
                                class="h-full w-full bg-black text-white rounded-lg py-2 px-4 transition duration-300"
                            >
                                Next
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>
@endsection()
@section('script')
    <script>

    </script>
@endsection()
