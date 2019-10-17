@extends('layouts.app')

@section('title')
   Password Reset
@stop

@section('styles')
<style>
    .container {
        background: white;
        width: 100%;
        height: 100%;
        background-size: 200%;
    }

    .logo {
        font-family: 'pacifico', 'Ubuntu';
        font-size: 36px;
        display: block;
        text-align: left;
        padding-left: 40px;
        margin-top: 20px;
    }

    .logo a{
        text-decoration: none;
        color:#000;
    }

    .logo span {
        color: #1aedd4;
    }

    label{
        font-family: 'Ubuntu';

    }

    .login-form {
        padding: 30px;
        max-width: 380px;
        margin: auto;
        background-color: white;
        border: 2px solid #EAEBED;
        border-radius: 12px;
    }

    .login-form h4 {
        margin: 0;
        font-family: Ubuntu;
        font-size: 32px;
        text-align: center;
        color: #000000;
    }

    .login-form p {
        font-family: Ubuntu;
        font-size: 18px;
        color: #000000;
    }

    .form-block {
        
        position: relative;
        
    }


    .form-block input {
        display: block;
        width: 100%;
        margin-top: 10px;
        height: 40px;
        border: 1px solid #EAEBED;
        border-radius: 4px;
        padding: 0 10px;

    }


    .input-box {
        margin: 0;
        border-radius: 10px;
        padding: 10px;
        margin: 10px 0px;
        width: 100%;
        border: 2px solid #eaebed;
        outline: none;

    }

    .btn {
            background-color: #1aedd4;
            color: #ffffff;
            padding: 10px;
            outline: none;
            font-size: 18px;
            font-weight: bold;
            border: none;
            font-family: 'Ubuntu';
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
    .btn:active{
        opacity: 0.6;
    }

    p{
        text-align: right;
        margin-top: 5px;
    }

    @media only screen and (max-width: 678px) {
        .bg {
            background-size: 300%;
        }
    }

    h5{
        font-family: 'Ubuntu';
        font-size:18px;
        font-weight: normal;
        margin-top: 3px;
        margin-left: 15px;
    }

    body{
        background-color: #ffffff;
        width: 100%;
        height: 100%;
        overflow-x: hidden;
    }
    
    .logo{
        font-size: 36px;
        font-family: 'pacifico', Ubuntu;
        display: block;
        text-align: left;
        padding-left: 40px;
        margin-top: 20px;
        }

        .logo a{
        text-decoration: none;
        color:#000;
        }

        .logo span {
        color: #0abab5;
        }

        .box2{
        padding: 30px;
        max-width: 580px;
        margin: auto;
        background-color: #ffffff;
        border: 1px solid #C4C4C4;
        border-radius: 6px;
        }

        .box2 h2 {
            color: #000000;
            text-align: center;
            font-size: 32px;
            font-family: 'Ubuntu';
            margin-bottom: 13px;
            margin-top: 18px;
            padding-top: 8px;
            line-height: 37px;
    }

    .text1{
        font-size: 18px;
        font-family: 'Ubuntu';
        text-align: center;

    }

    .text2{
        font-size: 16px;
        font-family: 'Ubuntu';
        text-align: center;

    }
    
    .logo a{
             	text-decoration: none;
             	color:#000;
             }

             .logo span {
             	color: #0abab5;
             }

             .box2{
             	padding: 30px;
                max-width: 580px;
                margin: auto;
                background-color: #ffffff;
                border: 1px solid #C4C4C4;
                border-radius: 6px;
             }

             .box2 h2 {
			     color: #000000;
			     text-align: center;
			     font-size: 32px;
			     font-family: 'Ubuntu';
			     margin-bottom: 13px;
			     margin-top: 18px;
			     padding-top: 8px;
			     line-height: 37px;
            }

            .text1{
              font-size: 18px;
              font-family: 'Ubuntu';
              text-align: center !important;

            }

            .text2{
              font-size: 16px;
              font-family: 'Ubuntu';
              text-align: center !important;

            }


</style>

@endsection

@section('content')
        
    @if (session('status'))
    <div class="logo"> <a href="https://lancers.app/"> Lan<span>c</span>ers </a></div>
    <br>

    <div class="container">

        <div class="row">

            <div class="col-sm-3"></div>

            <div class="col-sm-6">

                <div class="box">
                    <div class="box2">
                        <h2> Please check your mail</h2>
                        <div class="text1">
                            <p style="text-align: center !important;">An email has been sent to you with password reset
                                <br> instructions. Be sure to check your spam folder if you
                                <br> don't see it wiithin five minutes.</p>
                        </div>
                        <div class="text2">
                            <p style="text-align: center !important;"><a href="{{ route('password.request') }}">Resend instructions?</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @else

    <section class="container">
        <div class="logo"> <a href="https://lancers.app/">Lan<span>c</span>ers </a></div>
        <br>

        <div class="container">

            <div class="row">

                <div class="col-sm-3"></div>

                <div class="col-sm-6">

                    <div class="login-form">
                        <h4>We all forget sometimes</h4>
                        <h5><small>Enter your email address and we will send you password reset instruction</small></h5>
                        
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-block">
                                <label for="">Email Address</label>
                                <br>
                                <input id="email" placeholder="e.g Johndoe@example.com" type="email" class="form-control input-box @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn">Reset Password</button>
                            <p> <a href="{{ url('/login') }}">Or go back to Sign in</a></p>
                        </form>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </div>
        </div>

    </section>
    @endif
@endsection