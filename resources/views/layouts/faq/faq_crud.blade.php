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

<div class="content" style="margin: auto; width:80%;">
<div class="upp-content" style="">
    <h1>Frequently Asked Question </h1>
    <a href="{{ url('faq/faq_crud_form') }} " class="btn">Add new Questions and Answer</a>
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Number</th>
      <th scope="col">ID</th>
      <th scope="col">Question</th>
      <th scope="col">Answer</th>
      <th scope="col">Action</th>
      
     
    </tr>
  </thead>
  <tbody>
      @foreach($faq_detail as $row)
    <tr>
        <td scope="row"> {{$loop ->iteration}}</td>
        <td>{{ $row->id }}</td>
      <td>{{ $row->Question }}</td>
      <td> {{ $row ->Answer}}</td>
      <td>
          <a href=" {{ url('faq/faq_crud_form2',['id'=>$row->id])}} " class="btn">Edit</a>
          <form action="{{ url('faq/faq_crud',['id'=>$row->id])}}" method="post">
            @csrf
            @method('DELETE')
          <button class="btn" type="submit" onclick="return confirm('Confirm delete?')">Delete</button>
          </form>
      </td>
    </tr>
    
    @endforeach
  </tbody>
</table>
</div>    
    <div class="api-content">
    
    <button id="get-joke-btn" class="btn" >Get another joke</button>
   
    
    <script>
       document.getElementById('get-joke-btn').addEventListener('click',joke);
       
       async function joke(){
           let config ={
               headers: {
                   Accept: "application/json",
                   
               },
           };
           let a =await fetch("https://icanhazdadjoke.com/",config);
           let b= await a.json();
           document.getElementById('get-joke-btn').innerHTML=b.joke;
           
       }
       
    
    </script>
    </div>
</div>





@livewireScripts
@include('layouts.footer')
</body>

</html>
