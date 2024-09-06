<!-- LKY -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/ky.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        nav {
            color: #fff;
            padding: 10px;
            overflow: hidden;
        }

        nav p {
            color: black;
            float: right;
            margin-right: 20px;
        }

        .logout-link {
            color: black;
            text-decoration: none;
            margin-right: 10px;
            float: right;
            cursor: pointer
        }

        .btnBack{
            display: inline-block;
            padding: 8px 16px;
            color: #fff;
            background-color: lightslategray;
            border-radius: 4px;
            cursor: pointer;
        }

        .btnBack:hover{
            background-color: white;
            color: lightslategray;
        }
    </style>
</head>

<body>
    <nav>
        <div>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-link">
                <i class="fas fa-sign-out-alt"></i>
            </a>
            <form id="logout-form" action="{{ route('courier.logout') }}" method="POST" style="display: none">
                @csrf
            </form>
            <p class="username-link">{{ session('user_name') }}</p>
        </div>
    </nav>
</body>

</html>