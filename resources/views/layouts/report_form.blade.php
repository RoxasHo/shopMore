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
<style>
    .star {
  font-size: 10vh;
  cursor: pointer;
}
 
.one {
  color: rgb(255, 0, 0);
}
 
.two {
  color: rgb(255, 106, 0);
}
 
.three {
  color: rgb(251, 255, 120);
}
 
.four {
  color: rgb(255, 255, 0);
}
 
.five {
  color: rgb(24, 159, 14);
}
</style>
</head>
@livewireStyles
@include('layouts.header')
<div class="content" style="display:inline-block">
<div class="left-content" style="margin:100px;display:inline-block;width:auto">
<form name="report_form" action="{{ url('report_form',['id'=>$id])}}" method="post">
    @csrf
    <br/><br/>
    <laberl for="user_id" >Your user id:</laberl>
    <input type="text" name="id" value="{{ $id }} " readonly><br/><br/> 
  <label for="complaint_detail">Yours Complaint Details</label><br>
  <input type="text" id="description" name="complaint_details">
  <input type="submit" value="Submit">
</form> 
</div>
<div class="right-content" style="float:right;display:inline-block">
    <h3>Your recent complaint</h3><br/><br/>
     <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">Description</th>
      <th scope="col">Submitted_Date</th>
      <th scope="col">Updated_Date</th>
      <th scope="col"> Reply </th>
      <th scope="col">Status</th>
      <th scope="col">Yours Rating for this Service</th>
     
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
      <td> {{ $row ->status}}</td>
      <td> 
           <form action="{{ url('update_report_form_rating')}}" method="post">
          @csrf
          <input  name="id" type="hidden" value="{{$row->id }}">
          <input type="number" name="Rating" min="0" max="5" value="{{ $row-> Rating }}">
          <br/><br/>
          <button  type="submit" onclick="return confirm('Confirm update?')">Update</button>
           </form>
      </td>
   
    </tr>
    @endforeach
  </tbody>
</table>
</div>
</div>

@livewireScripts
@include('layouts.footer')
</body>
</html>
