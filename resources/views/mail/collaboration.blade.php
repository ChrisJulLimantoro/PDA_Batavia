@extends('mail.layout')

@section('style')
    <style>
        .greetings {
            font-size: 14px;
            margin-bottom: 5px;
        }

        .content {
            font-weight: bold;
            text-align: center;

            margin-bottom: 3px;
            width: 100%;
        }

        .content>p {
            font-size: 18px;
            text-transform: uppercase;
        }

        .table {
            margin-top: 20px;
            overflow-y: auto;
            text-align: center;
        }

        .closing {
            margin-top: 20px;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse
        }

        table th {
            background-color: #273656;
            color: #fff;
            padding: 5px;
            font-weight: bold;
        }

        tr {
            border: none;
        }

        td,
        th {
            padding: 5px;
            border: 1px solid #273656;
        }

        p {
            margin: 0;
            color: #000 !important;
        }
    </style>
@endsection

@section('content')
    <div class="">
        <div class="greetings">
                <p>
                    Thank you for your collaboration request! We have successfully received your request for a 
                    collaboration with product <b>{{ $data['product']->name }}</b> with this following details:
                </p>
                <br>
                <div class="content">
                    <p>Product : {{ $data['product']->name }}</p>
                    <p>Quantity : {{ $data['quantity'] }}</p>
                    <p>Date : {{ \Carbon\Carbon::parse($data['created_at'])->format('d-M-Y') }}</p>
                    <p>Delivery Address : {{ $data['address'] }}</p>
                </div>
                <br>
                <p>
                    We will review your request and get back to you as soon as possible. If you have any questions or need further assistance, please feel free to reach out to us.
                </p>
        </div>
        <div class="closing">
            <p>With Regards,</p>
            <p><i>Batavia Teams</i></p>
        </div>
    </div>
@endsection
