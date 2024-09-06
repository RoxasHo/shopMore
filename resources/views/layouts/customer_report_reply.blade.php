<!-- TMY -->
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
<title>ShopMore</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/logo/logo.png')}}">
<link rel="stylesheet" href="{{ asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}">

</head>
@livewireStyles
@include('layouts.header')
<div class="card-body">
    <form action="{{ url('customer_report_reply') }} " method="POST">
        @csrf
        <p>Report Id is</p>
        <input type="text" name="id" value="{{ $report->id }}" readonly>
        <div class="mb-3">
            
            <label for="Description">Problem Description of Customer</label>
           
            <input type="text" name="Desciption" value="{{ $report->Description }}" readonly>
        </div>
        <div class="mb-3">
            <label for="Reply">Previous Reply</label>
            
            <input type="text" name="previous Reply" value="{{ $report->repy }}" readonly>
        </div>
        <div class="mb-3">
            <label for="Reply2">Your reply</label>
            
            <input type="text" name="repy">
        </div>
        <button type"Submit">Save</button>
    </form>
    
    
    
</div>

@livewireScripts
@include('layouts.footer')
</body>
</html>
