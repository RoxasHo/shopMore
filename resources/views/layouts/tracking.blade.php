<!-- LKY -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Trace Order</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/ky.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    @include('layouts.courierheader')
    <h1 style="text-align: center;">Trace Order</h1>
    <div class="tracking-table">
    <div style="text-align:center">
        <button id="btnPrint" class="btnPrint">Print Report</button>
    </div>
        <table class="table shopping-summery text-center clean">
            <thead>
                <tr class="main-heading">
                    <th scope="col">Courier</th>
                    <th scope="col">Tracking ID</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($dataToPass))
                @foreach($dataToPass as $data)
                <tr>
                    <td>
                        <div class="couriertypeimg">
                            @php $trckCourierType = $data['trckCourierType']; @endphp
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
                    </td>

                    @php
                    $status = $data['status'];
                    $usr_cour_type = session('user_courier_type')
                    @endphp
                    @if(($usr_cour_type == $trckCourierType && $status == 1) || ($usr_cour_type == $trckCourierType && $status == 2) ||
                    ($usr_cour_type == $trckCourierType && $status == 3)|| $trckCourierType == 0)
                    <td class="image product-thumbnail"><a href="{{ route('tracking.detail', ['trckId' => $data['trckId']]) }}">{{$data['trckId']}}</a></td>
                    @elseif($status == '4')
                    <td style="font-weight:bold">{{$data['trckId']}}</td>
                    @else
                    <td style="font-weight:bold">{{$data['trckId']}}</td>
                    @endif

                    @if ($status == '1')
                    <td class="image product-thumbnail">Courier Picked</td>
                    @elseif ($status == '2')
                    <td class="image product-thumbnail">In Transit</td>
                    @elseif ($status == '3')
                    <td class="image product-thumbnail">Out for Delivery</td>
                    @elseif ($status == '4')
                    <td class="image product-thumbnail">Delivered</td>
                    @else
                    <td></td>
                    @endif
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3">
                        <p>No tracking data available!</p>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
@include('layouts.courierfooter')

<script>
document.getElementById('btnPrint').addEventListener('click', function() {
    window.location.href = "{{ route('courier.report') }}"
})
</script>

</html>