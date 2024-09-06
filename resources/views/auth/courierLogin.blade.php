<!-- LKY -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Courier Login</title>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/ky.css') }}">
</head>
@include('layouts.header')
<body>

    <div class="courierLogin">
        <form action="/courier/courierLogin" method="POST" style="width:30%">
            @csrf
            <div class="courierimg">
                <img src="{{ asset('assets/imgs/courier/Courier.png') }}" alt="Courier">
            </div>
            <h2 class="center">Courier Login</h2>
            <div>
                <label for="courierId">Courier ID</label>
                <input type="text" name="courierId" class="form-control" id="courierId" placeholder="Courier ID">
            </div>
            <div>
                <label for="courierPass">Password</label>
                <input type="password" name="courierPass" class="form-control" id="courierPass" placeholder="Password">
            </div>
            <button type="submit" class="btnCourierLogin">Login</button>
        </form>
    </div>
</body>
@include('layouts.footer')
</html>