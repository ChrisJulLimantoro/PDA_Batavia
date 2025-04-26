@section('style')
@endsection
@section('content')
<div class="flex flex-col h-screen w-full px-12 py-12">
    <div class="w-full flex justify-between items-center">
        <div class="text-lg font-bold">Order</div>
        <div class="text-md">{{ \Carbon\Carbon::parse($created_at)->format('d-M-Y') }}</div>
    </div>
    <div class="text-lg font-bold mt-2">{{ $user->name }}</div>
    <div class="text-md mt-2">{{ $address }}</div>
    <div class="text-md font-bold mt-6">Order Details</div>
    
</div>