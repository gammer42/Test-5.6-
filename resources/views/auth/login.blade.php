<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:00 GMT -->
<head>
    
@include('layouts.admin_include.head')
        
</head>

<body>
        <div class="container-fluid-full">
        <div class="row-fluid">
                    
            <div class="row-fluid">
                <div class="login-box">
                    <div class="icons">
                        <a href="index.html"><i class="halflings-icon home"></i></a>
                        <a href="#"><i class="halflings-icon cog"></i></a>
                    </div>
                    <h2>Login to your account</h2>
                    <form class="form-horizontal" action="{{ route('login') }}" method="post">
                        <fieldset>
                            @csrf
                            <div  class="input-prepend {{$errors->has('email')?'alert alert-warning' : ''}}" title="Email">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10" name="email" id="username" type="email" placeholder="Email" value="{{old('email')}}"/>
                                @if ($errors->has('email'))
                                    <div class="text-center" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend {{$errors->has('password')?'alert alert-warning':''}}" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10" name="password" id="password" type="password" placeholder="Password"/>
                                @if ($errors->has('password'))
                                    <div class="text-center" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                            
                            <label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>

                            <div class="button-login">  
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                    </form>
                    <hr>
                    <h3>Forgot Password?</h3>
                    <p>
                        No problem, <a href="#">click here</a> to get a new password.
                    </p>    
                </div><!--/span-->
            </div><!--/row-->
            

    </div><!--/.fluid-container-->
    
        </div><!--/fluid-row-->
    
    <!-- start: JavaScript-->
    @include('layouts.admin_include.js')
    <!-- end: JavaScript-->
    
</body>

<!-- Mirrored from bootstrapmaster.com/live/metro/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Jan 2018 16:57:01 GMT -->
</html>
