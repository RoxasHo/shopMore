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
    <form action="{{ url('faq/faq_crud_form') }} " method="POST">
        @csrf
        <input type="text" name="id" readonly value="Id :">
        <div class="mb-3">
            <label for="Question">Question</label>
            <input type="text" name="Question">
        </div>
        <div class="mb-3">
            <label for="Answer">Answer</label>
            <input type="text" name="Answer">
        </div>
        <button>Save</button>
    </form>
    
    
    
</div>


    
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

@include('layouts.footer')
@livewireScripts

</body>
</html>
