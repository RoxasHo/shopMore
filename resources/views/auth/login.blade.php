<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"> -->
<!-- HKH -->
<x-app-layout>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>                    
                    <span></span> Login
                </div>
            </div>
        </div>
        <section class="pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 m-auto">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h3 class="mb-30">Login</h3>
                                        </div>
                                        <form method="post" action="{{route('login')}}">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="email" placeholder="Your Email" :value="old('email')" required autofocus>
                                                <x-input-error :messages="$errors->get('email')" class="text-danger" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                                <x-input-error :messages="$errors->get('password')" class="text-danger" />
                                            </div>
                                            <!-- <div class="form-group row">
                                                <div class="col-md-2" data-size="compact"> {!! htmlFormSnippet() !!} </div>
                                                <x-input-error :messages="$errors->get('g-recaptcha-response')" class="text-danger" />
                                            </div> -->
                                            <!-- <div class="captcha">
                                                <span>{!! captcha_img('flat') !!}</span>
                                                <button type="button" class="btn btn-danger reload" id="reload">
                                                    &#x21bb;
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Enter Captcha" name="captcha" required>
                                                @error('captcha')
                                                    <label for="" class="text-danger">{{ $message }}</label>
                                                @enderror
                                                <x-input-error :messages="$errors->get('captcha')" class="text-danger" />
                                            </div> -->
                                            <div class="login_footer form-group">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="exampleCheckbox1" value="">
                                                        <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                                    </div>
                                                </div>
                                                <a class="text-muted" href="{{route('password.request')}}">Forgot password?</a>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-6">
                            <img src="assets/imgs/logo/logo.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>

<!-- <script>

    $('#reload').click(function(){
        $.ajax({
            type:'GET',
            url:'reload-captcha',
            success:function(data){
                $(".captcha span").html(data.captcha)
            }
        });
    });

    function doubleSubmit(f) 
    {
        // submit to action in form
        f.submit();

        // set second action and submit
        f.target="_blank";
        f.action="/post";
        f.submit();
        return false;
    }

</script> -->