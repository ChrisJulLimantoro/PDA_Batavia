@extends('layout')
@section('styles')
    <title>Order</title>
@endsection()
@section('content')
<div
class="h-full md:h-3/4 max-h-[95vh] md:max-h-[80vh] w-full md:w-3/4 bg-white md:rounded-lg overflow-scroll bg-white shadow-xl"
>  
        <!-- Title Stepper OnBoarding Step -->
		<div class="grid grid-cols-2 py-4 md:py-6">
			<!-- Step 1 -->
			<div class="flex flex-col items-center">
				<div
                class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-white border border-pinkDark"
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
                    class="w-10 h-10 flex items-center justify-center rounded-full font-bold bg-black text-white"
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
                        Paid at this QR Code!
                    </h2>

                    <img src="{{ asset('images/qr_code.png') }}" alt="QR Code" class="w-1/2 mx-auto mt-4" />
                </div>

            </div>

            <form class="w-full h-full">
                {{-- Hidden Input --}}
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <input type="hidden" name="quantity" value="{{ $quantity }}">
                <input type="hidden" name="price" value="{{ $price }}">
                <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                <input type="hidden" name="shipping_cost" value="{{ $shipping_cost }}">
                <input type="hidden" name="tax" value="{{ $tax }}">
                <input type="hidden" name="total_price" value="{{ $total_price }}">
                <input type="hidden" name="address" value="{{ $address }}">
                <input type="hidden" name="description" value="{{ $description }}">
                @csrf
                <div class="h-full flex flex-col items-center justify-between px-8 py-8">
                    <div class="w-full h-full">
                        <h2 class="w-full text-lg font-bold text-start my-2">
                            Detailed Order
                        </h2>
                        <!-- Product -->
                        <div class="w-full text-sm font-bold text-start">Product</div>
                        <div class="flex justify-between items-center w-full mb-4">
                            <div>{{ $product['name'] }}</div>
                            <div>{{ $quantity }} x {{ 'Rp '.number_format($price,0,',','.') }}</div>
                        </div>
                        
                        <div class="flex justify-between items-center w-full">
                            <div class="text-md">Subtotal</div>
                            <div>{{'Rp '. number_format($subtotal,0,',','.') }}</div>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <div class="text-md">Shipping Cost</div>
                            <div>{{'Rp '. number_format($shipping_cost,0,',','.') }}</div>
                        </div>
                        <div class="flex justify-between items-center w-full">
                            <div class="text-md">Tax</div>
                            <div>{{'Rp '. number_format($tax,0,',','.') }}</div>
                        </div>
                        <div class="flex justify-between items-center w-full mb-3">
                            <div class="text-md font-bold">Total</div>
                            <div class="text-md font-bold">{{'Rp '. number_format($total_price,0,',','.') }}</div>
                        </div>
                        {{-- Pengiriman Pada --}}
                        <div class="w-full text-sm font-bold text-start">Delivery Address</div>
                        <div class="w-full text-start mb-2">{{ $address }}</div>
                        <!-- Description -->
                        <div class="w-full text-sm text-start font-bold">Description</div>
                        <div class="flex justify-between items-center w-full">
                            {{ $description }}
                        </div>
                    </div>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 w-full mt-24 items-center h-full">
                        <!-- Already Have One Button -->
                        <div class="h-full">
                            <a
                                href="{{ route('order.add') }}"
                                class="h-full w-full inline-block bg-gray-100 text-center rounded-lg py-2 px-4 transition duration-300"
                            >
                                Cancel
                            </a>
                        </div>

                        <!-- Submit (Next) Button -->
                        <div class=h-full>
                            <button
                                id="submit"
                                type="button"
                                class="h-full w-full bg-black text-white rounded-lg py-2 px-4 transition duration-300"
                            >
                                Submit Order
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
        $(document).ready(function(){
            $('#submit').on('click', function(){
                // Get the form data
                var formData = new FormData();
                formData.append('product_id', $('input[name="product_id"]').val());
                formData.append('quantity', $('input[name="quantity"]').val());
                formData.append('price', $('input[name="price"]').val());
                formData.append('subtotal', $('input[name="subtotal"]').val());
                formData.append('shipping_cost', $('input[name="shipping_cost"]').val());
                formData.append('tax', $('input[name="tax"]').val());
                formData.append('total_price', $('input[name="total_price"]').val());
                formData.append('address', $('input[name="address"]').val());
                formData.append('description', $('input[name="description"]').val());
                formData.append('_token', "{{ csrf_token() }}");
                console.log(formData);
                $.ajax({
                    url: "{{ route('order.payment.save') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: async function(data) {
                        if (data.success) {
                            await Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                                timer: 2000,
                                confirmButtonColor: '#000000', // <-- Black button text background
                                confirmButtonText: 'OK',
                            }).then(() => {
                                window.location.href = "{{ route('home') }}"
                            })
                        } else {
                            await Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                                timer: 2000,
                            })
                        }
                    },
                    error: async function(err) {
                        // console.log(JSON.parse(err));    
                        await Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: err.responseJSON.message,
                        })
                    }
                })
            })
        })
    </script>
@endsection()
