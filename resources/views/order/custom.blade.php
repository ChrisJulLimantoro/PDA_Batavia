@extends('layout')
@section('styles')
    <title>Order</title>
    <style>
        input#file-upload-button {
            background: #ffffff;
            color: #000000;
        }
    </style>
@endsection()
@section('content')
<div
class="h-full md:h-3/4 max-h-[95vh] md:max-h-[80vh] w-full md:w-3/4 bg-white md:rounded-lg overflow-scroll bg-white shadow-xl"
>  
        <!-- Title Stepper OnBoarding Step -->
		<div class="grid grid-cols-1 py-4 md:py-6">
			<!-- Step 1 -->
			<div class="flex flex-col items-center">
				<div
					class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-black text-white"
				>
					1
				</div>
				<div class="mt-2 text-sm text-center">
					Place Your Custom Order
				</div>
			</div>
		</div>
        {{-- Horizontal --}}
        <hr class="border-t border-gray-300 border-opacity-50" />
        <!-- content -->
        <div class="grid grid-cols-1 md:grid-cols-2 w-full">
            <form class="w-full">
                @csrf
                <div class="flex flex-col items-center justify-center px-8 py-8 gap-4">
                    <h2 class="w-full text-lg font-bold text-start mt-2">
                        Collaboration Request Form
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

                    {{-- Custom File Design --}}
                    <div class="w-full">
                        <label for="custom_design" class="block text-sm font-medium mb-1">Custom File</label>
                        <input
                        class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100 dark:focus:border-primary"
                        type="file" accept=".png" id="custom_design" name="custom_design" />
                        @error('custom_design')
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
                                href=""
                                class="h-full w-full inline-block bg-gray-100 text-center rounded-lg py-2 px-4 transition duration-300"
                            >
                                Change to Order
                            </a>
                        </div>

                        <!-- Submit (Next) Button -->
                        <div class=h-full>
                            <button
                                id="submit"
                                type="button"
                                class="h-full w-full bg-black text-white rounded-lg py-2 px-4 transition duration-300"
                            >
                                Submit Request
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="md:flex flex-col mt-10 hidden h-full overflow-hidden justify-between">
                <div class="py-8">
                    <h2 class="text-xl lg:text-2xl font-bold text-center mt-6">
                        Place Your Collaboration Request!
                    </h2>

                    <p class="text-md lg:text-lg text-start mt-6 px-8">
                        The Company Here will be your first step into joining our community.
                        You can create a company that will be used to manage your stores.
                        You can also create multiple companies under one account.
                    </p>
                </div>
            </div>
        </div>
</div>
@endsection()
@section('script')
    <script>
        $(document).ready(function(){
            $('#submit').on('click',function(){
                // Get the form data
                var formData = new FormData();
                formData.append('product_id', $('#product_id').val());
                formData.append('quantity', $('#quantity').val());
                formData.append('address', $('#address').val());
                formData.append('custom_design', $('#custom_design')[0].files[0]);
                formData.append('description', $('#description').val());
                formData.append('_token', '{{ csrf_token() }}')

                // Send the data to the server
                $.ajax({
                    url: "{{ route('order.custom.post') }}",
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle success response
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Your request has been submitted and please wait for the confirmation.',
                            });
                            window.location.href = "{{ route('home') }}";
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error response
                        console.error(xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: xhr.responseJSON.message || 'Something went wrong!',
                        });
                    }
                });
            })
        })
    </script>
@endsection()
