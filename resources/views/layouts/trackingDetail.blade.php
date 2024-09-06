<!-- LKY -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tracking Update</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/ky.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    @include('layouts.courierheader')
    <h1 class="center">Tracking Update</h1>
    <div class="trackingDetail">
        <form action="{{ route('courier.tracking.update') }}" method="POST" style="width:30%">
            @csrf
            <?php
            $trckCourierType = $trackingDetails->courier_type;
            ?>
            <div class="couriertrckimg">
                @if ($trckCourierType == '1')
                <img src="{{ asset('assets/imgs/courier/GDEX.png') }}" alt="GDEX">
                @elseif ($trckCourierType == '2')
                <img src="{{ asset('assets/imgs/courier/Fedex.png') }}" alt="Fedex">
                @elseif ($trckCourierType == '3')
                <img src="{{ asset('assets/imgs/courier/J&T Express.png') }}" alt="J&T">
                @elseif ($trckCourierType == '4')
                <img src="{{ asset('assets/imgs/courier/City-Link Express.png') }}" alt="City-Link">
                @elseif ($trckCourierType == '5')
                <img src="{{ asset('assets/imgs/courier/NinjaVan.png') }}" alt="NinjaVan">
                @else
                @endif
            </div>
            <div>
                <label for="orderId">Order ID</label>
                <input type="text" name="orderId" class="courier-readonly" id="orderId" value="{{ $trackingDetails->order_id }}" readonly>
            </div>
            <div>
                <label for="trckId">Tracking ID</label>
                <input type="text" name="trckId" class="courier-readonly" id="trckId" value="{{ $trackingDetails->tracking_id }}" readonly>
            </div>
            <div>
                <label for="ordItem">Order Item</label>
                <div class="formatted-order-items">
                    @foreach(explode(',', $trackingDetails->order_item) as $item)
                    @php
                    $item = trim($item);
                    $parts = explode(' X ', $item);
                    @endphp
                    @if(count($parts) === 2)
                    <?php
                    $productName = trim($parts[0]);
                    $quantity = trim($parts[1]);
                    ?>
                    <div class="order-item">
                        <span>{{ $productName }}</span> <span>(Quantity: {{ $quantity }})</span>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div>
                <label for="status">Status</label>
                <select id="status" name="status" class="courier-dropdown">
                    <option value="" disabled @if($trackingDetails->status == 0) selected @endif>Select a status</option>
                    <option value="1" @if($trackingDetails->status == 1) selected @endif>Courier Picked</option>
                    <option value="2" @if($trackingDetails->status == 2) selected @endif>In Transit</option>
                    <option value="3" @if($trackingDetails->status == 3) selected @endif>Out for Delivery</option>
                    <option value="4" @if($trackingDetails->status == 4) selected @endif>Delivered</option>
                </select>
            </div>
            <div style="margin-top: 20px">
                <label for="total">Total Price In MYR</label>
                <input type="text" name="total" class="courier-readonly" id="total" value="RM {{ $trackingDetails->total }}" readonly>
            </div>
            <div>
                <label for="convertedPrice">Convert Price</label></br>
                <input type="text" name="convertedPrice" class="convertPrice" id="convertedPrice" readonly>
                <select id="currency" name="currency" class="currency">
                    <option value="" disabled>Select an option</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="AUD">AUD</option>
                    <option value="HKD">HKD</option>
                    <option value="SGD">SGD</option>
                    <option value="CNY">CNY</option>
                </select>
            </div>
            <div style="text-align:center">
                <input type="button" value="Convert Currency" class="btnConvert" onclick="convertCurrency()" />
            </div>
            <button style="margin-bottom: 20px" type="submit" class="btnCourierUpdate">Update</button>
        </form>
    </div>
</body>
@include('layouts.courierfooter')

<script>
    function convertCurrency() {
        var totalMYR = '{{ $trackingDetails->total }}';
        var selectedCurrency = document.getElementById('currency').value;

        // Fetch the latest exchange rate from MYR to the selected currency
        fetch(`https://api.frankfurter.app/latest?amount=${totalMYR}&from=MYR&to=${selectedCurrency}`)
            .then(response => response.json())
            .then(data => {
                var convertedAmount = data.rates[selectedCurrency];
                document.getElementById('convertedPrice').value = `${selectedCurrency} ${convertedAmount.toFixed(2)}`;
            })
            .catch(error => {
                console.error('Error converting currency:', error);
            });
    }
</script>

</html>