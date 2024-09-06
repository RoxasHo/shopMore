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
    <div class="content" >

    <h1>Recent report from customer </h1>
   
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Description</th>
      <th scope="col">Date Created</th>
      <th scope="col">Date Updated</th>
      <th scope="col">Reply</th>
      <th scope="col">Rating</th>
      <th scope="col">Status</th>
      <td scopes="col">Reply to customer</th>
    </tr>
  </thead>
  <tbody>
      @foreach($report as $row)
    <tr>
        <td scope="row"> {{$loop ->iteration}}</td>
      <td>{{ $row->Description }}</td>
      <td> {{ $row ->created_at}}</td>
      <td> {{ $row ->updated_at}}</td>
      <td> {{ $row -> repy }} </td>
      <td> {{ $row -> Rating }}</td>
      <td> {{ $row -> status }}</td>
      <td><a href=" {{ url('customer_report_reply',['id'=>$row->id])}} " class="btn">Update reply</a></td>
    </tr>
    
    @endforeach
  </tbody>
</table>
    
    
    
    
    
 
</div>

@livewireScripts
@include('layouts.footer')
</body>
</html>
