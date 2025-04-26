@extends('mail.layout')

@section('style')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }
    .container {
        width: 100%;
        padding: 48px;
        box-sizing: border-box;
    }
    .header-table {
        width: 100%;
        margin-bottom: 16px;
    }
    .header-table td {
        padding: 0px;
    }
    .title {
        font-size: 18px;
        font-weight: bold;
    }
    .date {
        font-size: 16px;
        text-align: right;
    }
    .customer-name {
        font-size: 18px;
        font-weight: bold;
        margin-top: 8px;
    }
    .address {
        font-size: 16px;
        margin-top: 8px;
    }
    .section-title {
        font-size: 18px;
        font-weight: bold;
        margin-top: 24px;
    }
    .order-details {
        width: 100%;
        margin-top: 16px;
    }
    .order-details td {
        padding: 4px;
    }
    .row-bold {
        font-weight: bold;
    }
    .line {
        border-top: 1px solid rgba(0, 0, 0, 0.2);
        margin-top: 8px;
        margin-bottom: 8px;
    }
    .description-section {
        margin-top: 8px;
    }
    .description-title {
        font-size: 16px;
        font-weight: bold;
    }
    .description-content {
        font-size: 16px;
        margin-top: 4px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <table class="header-table">
        <tr>
            <td class="title">Order</td>
            <td class="date">{{ \Carbon\Carbon::parse($data['created_at'])->format('d-M-Y') }}</td>
        </tr>
    </table>
    <div class="customer-name">{{ $data['user']->name }}</div>
    <div class="address">{{ $data['address'] }}</div>

    <div class="section-title">Order Details</div>
    <table class="order-details">
        <tr>
            <td class="row-bold">Product</td>
            <td class="row-bold">Price</td>
        </tr>
        <tr>
            <td>{{ $data['product']->name }}</td>
            <td>{{ $data['quantity'] }} x {{ 'Rp '.number_format($data['price'],0,',','.') }}</td>
        </tr>
        <tr>
            <td class="row-bold">Subtotal</td>
            <td>{{ 'Rp '.number_format($data['subtotal'],0,',','.') }}</td>
        </tr>
        <tr>
            <td class="row-bold">Shipping Cost</td>
            <td>{{ 'Rp '.number_format($data['shipping_cost'],0,',','.') }}</td>
        </tr>
        <tr>
            <td class="row-bold">Tax</td>
            <td>{{ 'Rp '.number_format($data['tax'],0,',','.') }}</td>
        </tr>
    </table>
    <div class="line"></div>
    <table class="order-details">
        <tr>
            <td class="row-bold">Total</td>
            <td class="row-bold">{{ 'Rp '.number_format($data['total_price'],0,',','.') }}</td>
        </tr>
    </table>

    <div class="description-section">
        <div class="description-title">Description</div>
        <div class="description-content">{{ $data['description'] }}</div>
    </div>
</div>
@endsection
