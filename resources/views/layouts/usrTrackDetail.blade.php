<!-- LKY -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Order Details</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/ky.css') }}">
</head>

<body>
    @include('layouts.header')
    <h1 style="text-align: center; margin: 20px 20px">Order Details</h1>
    <div class="list-group" style="width:80%; margin:auto; padding-bottom: 30px">
        @if(!empty($dataToPass))
        <div class="grid-container">
            <h3 class="text-left" style="color: steelblue;">Tracking ID: {{ $dataToPass[0]['tracking_id'] }}</h3>
            <h3 class="text-right" style="color: steelblue;">Order ID: {{ $dataToPass[0]['order_id'] }}</h3>
        </div>
        @php
        $checkDel = true;
        @endphp
        @foreach($dataToPass as $data)
        <table style="width:100%; border-collapse: collapse; border: none;">
            <tr>
                <td style="font-weight:bold; width:15%">Order Item:</td>
                <td style="width:35%">
                    @php
                    // Explode the ord_item string by comma and trim whitespace
                    $items = explode(',', $data['order_item']);
                    @endphp

                    @foreach($items as $item)
                    @php
                    // Trim any leading or trailing whitespace
                    $item = trim($item);

                    // Split the item by ' X ' to separate product name and quantity
                    $parts = explode(' X ', $item);

                    if (count($parts) === 2) {
                    // Extract product name and quantity
                    $productName = trim($parts[0]);
                    $quantity = trim($parts[1]);
                    @endphp

                    <div>
                        <span>{{ $productName }}</span> <span>(Quantity: {{ $quantity }})</span><br>
                    </div>

                    @php
                    }
                    @endphp
                    @endforeach
                </td>
                @php
                $status = $data['status'];
                @endphp
                <td style="font-weight:bold; width:15%">Status:</td>
                @if ($status == '1')
                <td style="color:red; width:35%">Courier Picked</td>
                @elseif ($status == '2')
                <td style="color:red; width:35%">In Transit</td>
                @elseif ($status == '3')
                <td style="color:red; width:35%">Out for Delivery</td>
                @elseif ($status == '4')
                <td style="color:red; width:35%">Delivered</td>
                @php $checkDel = false; @endphp
                @else
                <td></td>
                @endif
            </tr>
            <tr>
                <td style="font-weight:bold">Updated Date:</td>
                <td>{{$data['date_time']}}</td>
                <td style="font-weight:bold;">Total Amount:</td>
                <td>{{$data['total']}}</td>
            </tr>
        </table>
        @endforeach
        @if(!$checkDel)
        <div>
            <form action="{{ route('tracking.delete', $dataToPass[0]['tracking_id']) }}" method="GET">
                @csrf
                <button type="submit" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
            </form>
        </div>
        @endif
        @else
        <tr>
            <td colspan="3">
                <p>No tracking data available!</p>
            </td>
        </tr>
        @endif
    </div>
</body>
@include('layouts.footer')

</html>