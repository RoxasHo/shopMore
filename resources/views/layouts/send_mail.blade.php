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

.content {
    overflow-x: auto;
    width: 60%;
    margin: 0 auto;
}
</style>
</head>
@livewireStyles
@include('layouts.header')
<div class="content">
<form name="send_mail_form" action=" {{ url('send-email') }}" method="post">
    @csrf
    <br/><br/>
    <label for="user_email" >User Email:</label>
    <input type="text" name="email_address"  ><br/><br/> 
  <label for="title">Title:</label>
  <input type="text" id="title" name="title"><br/><br/>
  <label for="content">Content:</label>
  <textarea type="text" id="content" name="content"></textarea><br/><br/>
  
  <button type="reset" class="btn">Reset</button>
  <button type="submit" onclick="alert('E-mail Sent Successfully!')">Send</button>
  
</form> 
</div>

@livewireScripts
@include('layouts.footer')
</body>
</html>
