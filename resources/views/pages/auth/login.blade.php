<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Sign in - AKV</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1692870487" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="./dist/js/demo-theme.min.js?1692870487"></script>
    <div class="page page-center">
      
      @if(session('error'))

        <div class="alert  alert-important alert-danger alert-dismissible">
          <div class="d-flex">
            <div><svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>
            </div>
            <div>{{session('error')}}</div>
          </div>
          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    
      @endif

      <div class="container container-tight py-4">
        <div class="text-center mb-4">
          <a href="." class="navbar-brand navbar-brand-autodark">
            <img src="{{asset('/images/akvlogo.svg')}}" width="110" height="32" alt="Tabler" class="navbar-brand-image mb-3">
            <h1>AKV</h1>
          </a>
        </div>
        <div class="card card-md">
          <div class="card-body">
            <h2 class="h2 text-center mb-4">Login to your account</h2>
            <form action="{{url('/admin/login')}}" method="post" autocomplete="off" novalidate>
              @csrf
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" placeholder="your@email.com" autocomplete="off" name="email" value="{{old('email')}}">
                @error('email')
            <div class="text-danger mt-2">
                {{$message}}
            </div>
            @enderror
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                  {{-- <span class="form-label-description">
                    <a href="./forgot-password.html">I forgot password</a>
                  </span> --}}
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control"  placeholder="Your password"  id="pwd" autocomplete="off" name="password">
                  <span class="input-group-text" id="eye_pass">
                    <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                    </a>
                  </span>
                  
                </div>
                @error('password')
            <div class="text-danger mt-2">
                {{$message}}
            </div>
            @enderror
              </div>
              <div class="mb-2">
                <label class="form-check">
                  <input type="checkbox" class="form-check-input" name="remember"/>
                  <span class="form-check-label">Remember me on this device</span>
                </label>
              </div>
              <div class="form-footer">
                <button type="submit" class="btn btn-primary w-100">Sign in</button>
              </div>
            </form>
          </div>
          
        </div>
        
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js?1692870487" defer></script>
    <script src="./dist/js/demo.min.js?1692870487" defer></script>
  </body>
  <script>

    let eye_pass=document.getElementById('eye_pass');

    let pwd=document.getElementById('pwd');

    eye_pass.addEventListener('click',()=>{

      if(pwd.type=='text'){
        pwd.type='password'
      }else{
        pwd.type='text'
      }
        // if(chk_box.checked){
        //          pwd.type='text';
        // }else{

        //     pwd.type='password';
            
        // }
    })


</script>
</html>

