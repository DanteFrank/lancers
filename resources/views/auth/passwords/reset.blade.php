@extends('layouts.app')

@section('styles')
<style>
     body{
     background-color: #ffffff;
     width: 100%;
     height: 100%;
     overflow-x: hidden;
     font-family: 'ubuntu' 
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
 .logo a {
     text-decoration:none;
     color:#000;
}
 .box2{
     padding: 30px;
     max-width: 580px;
     margin: auto;
     background-color: #ffffff;
     border: 2px solid #000000;
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
 .box2 h4 {
     color: #262626;
     text-align: center;
     font-size: 18px;
     line-height: 21px;
     font-family: ubuntu;
     margin-bottom: 13px;
     margin-top: 18px;
     padding-top: 8px;
     margin-left: 38px;
}
 form {
     position: relative;
     top: 30px;
     max-width: 500px;
     margin: auto;
     padding-bottom: 30px;
     display: grid;
     grid-template-areas: 'input1' 'View Project';
}
 form input {
     display: block;
     width: 100%;
     margin-top: 10px;
     height: 40px;
     border: 6px solid #eaebed;
     border-radius: 6px;
     padding: 0 10px;
}
 input[type=text], select {
     width: 100%;
     padding: 0 10px;
     border: 1px solid #eaebed;
     border-radius: 4px;
     height: 45px;
     margin-top: 10px;
}
 label {
     font-family: 'Ubuntu';
}
 .Reset-Password {
     background-color: #1aedd4;
     color: white;
     padding: 10px;
     outline: none;
     font-size: 1em;
     border: none;
     font-family: 'Ubuntu';
     cursor: pointer;
     border-radius: 5px;
}
 .Reset-Password:active{
     opacity: 0.6;
}
 @media screen and (max-width: 640px) {
     .box {
         width: 100% 
    }
}
 .invalid-feedback {
     display: block;
     width: 100%;
     margin-top: .25rem;
     font-size: 80%;
     color: #dc3545;
}

</style>
@endsection

@section('content')
<div class="logo"> <a href="https://lancers.app/">Lan<span>c</span>ers </a></div>
<br>

<div class="container">

    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="box">

                <div class="box2">

                    <h2> Enter a new password</h2> 
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus> 
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> 
                        @enderror
                        <div class="box3">
                            <label for="">Password</label>
                            <br> 
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> 
                            @enderror
                            <input id="password" type="password" class="input-box form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <!-- <input class="input-box" type="text" name="Password"> -->
                            </div>
                        <div class="box3">
                            <label for="password_confirmation">Password Confirmation</label>
                            <br>
                            <input id="password-confirm" type="password" class="input-box form-control" name="password_confirmation" required autocomplete="new-password">
                            <!-- <input class="input-box" type="text" name="password_confirmation"> -->
                        </div>

                        <button type="submit" class="Reset-Password">
                            Reset Password
                        </button>

                    </form>

                </div>

                <div class="col-sm-3"></div>

            </div>

        </div>

    </div>

</div>
@endsection
