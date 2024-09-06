<!-- LKY -->
<!DOCTYPE html>
<html lang="en">
@php use Carbon\Carbon; @endphp
<head>
    <meta charset="utf-8">
    <title>Trace Order</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/ky.css') }}">
</head>

<body>
    @include('layouts.header')
    <h1 style="text-align: center; margin: 20px 20px">Trace Order</h1>
    <div class="list-group" style="width:80%; margin:auto; padding-bottom: 30px">
        @if(!empty($dataToPass))
        @foreach($dataToPass as $data)
        <a href="{{ route('usr.tracking.detail', ['trackId' => $data['tracking_id']]) }}" class="list-group-item list-group-item-action" role="button">
            <table style="width:100%; border-collapse: collapse; border: none;">
                <h2 class="text-center" style="color:steelblue">{{$data['tracking_id']}}</h2>
                <tr>
                    <td style="font-weight:bold; width: 15%">Order ID:</td>
                    <td style="width: 20%">{{ $data['order_id'] }}</td>
                    <td style="font-weight:bold; width: 15%">Order Items:</td>
                    <td style="width: 50%">
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
                </tr>
                <tr>
                    @php
                    $status = $data['status'];
                    @endphp
                    <td style="font-weight:bold">Status:</td>
                    @if ($status == '1')
                    <td style="color:red">Courier Picked</td>
                    @elseif ($status == '2')
                    <td style="color:red">In Transit</td>
                    @elseif ($status == '3')
                    <td style="color:red">Out for Delivery</td>
                    @elseif ($status == '4')
                    <td style="color:red">Delivered</td>
                    @else
                    <td></td>
                    @endif
                    <td style="font-weight:bold">Updated Date:</td>
                    <td>{{ \Carbon\Carbon::parse($data['date_time'])->format('Y-m-d') }}</td>
                </tr>
            </table>
        </a>
        @endforeach
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